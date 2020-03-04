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

        public function getAllProductBySlug($slug){
            return $this->query("
                WITH RECURSIVE categoryTree (name,id,parent_id)
                AS ( 	SELECT child.name, child.id,child.parent_id
                            FROM categories child
                            WHERE slug = '$slug'
                            UNION ALL
                            SELECT child.name, child.id,child.parent_id
                            FROM categories child
                                JOIN categoryTree tree ON tree.id = child.parent_id 
                            )
                SELECT a.* FROM products a INNER JOIN ( SELECT *  FROM categoryTree ) b ON a.category_id = b.id  
            ");
        }
    }
?>