<?php 
    class Category extends Database{

        private $table = "categories";
        
        public function getAll(){
            return $this->query("SELECT a.*,b.name as parent_name FROM $this->table a LEFT JOIN categories b ON a.parent_id = b.id");
        }

        public function add($data){
            return $this->insert($this->table,$data);
        }

        public  function edit($data,$id){
            return $this->update($this->table,$data,['id'=>$id]);
        }

        public  function getBySlug($slug){
            return $this->select_one($this->table,[],['slug'=>$slug]);
        }

        // work with mariadb >= 10.2
        
        // public function getAllProductBySlug($slug){
        //     return $this->query("
        //         WITH RECURSIVE categoryTree (name,id,parent_id)
        //         AS ( 	SELECT child.name, child.id,child.parent_id
        //                     FROM categories child
        //                     WHERE child.slug = '$slug'
        //                     UNION ALL
        //                     SELECT child.name, child.id,child.parent_id
        //                     FROM categories child
        //                         JOIN categoryTree tree ON tree.id = child.parent_id 
        //                     )
        //         SELECT a.* FROM products a INNER JOIN ( SELECT *  FROM categoryTree ) b ON a.category_id = b.id  
        //     ");
        // }

        public function getAllProductBySlug($id){
            return $this->query("SELECT a.* FROM products a INNER JOIN ( SELECT id,name,parent_id  FROM categories WHERE id = $id UNION ALL
                                    SELECT  id,name,parent_id 
                                    FROM    ( SELECT * FROM categories	order by parent_id, id) categories_sorted, (SELECT @pv := $id) initialisation
                                    WHERE   find_in_set( parent_id, @pv ) and length( @pv := concat( @pv, ',', id ) ) ) b ON a.category_id = b.id 
            ");
        }
    }
?>