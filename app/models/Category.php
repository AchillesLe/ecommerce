<?php 
    class Category extends Database{

        private $table = "categories";
        
        public function getAll(){
            return $this->query("SELECT a.*,b.name as parent_name FROM categories a LEFT JOIN categories b ON a.parent_id = b.id");
        }

        public function add($data){
            return $this->insert($this->table,$data);
        }

        public  function edit($data,$id){
            return $this->update($this->table,$data,['id'=>$id]);
        }

    }
?>