<?php 
    class Category extends Database{

        private $table = "categories";
        
        public function getAll(){
            return $this->select_multi($this->table,[],[]);
        }

    }
?>