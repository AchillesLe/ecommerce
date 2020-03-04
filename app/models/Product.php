<?php 
    class Product extends Database{

        private $table = "products";
        
        public function getAll(){
            return $this->query("SELECT a.*,b.name as category FROM $this->table a LEFT JOIN categories b ON a.category_id = b.id");
        }

        public function add($data){
            return $this->insert($this->table,$data);
        }

        public  function edit($data,$id){
            return $this->update($this->table,$data,['id'=>$id]);
        }

    }
?>