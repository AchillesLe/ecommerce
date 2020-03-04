<?php 
    class View{

        public $file = "index.php";
        public $title = "";
        public $data = [];
        
        public function __construct( $file = 'index.php' , $title = '' , $data = [] ){
            $this->file = $file;
            $this->title = $title;
            $this->data = $data;
        }

        public function render(){
            if( file_exists( $this->file ) ){
                require( $this->file );
            }else{
                require( VIEW_URL.'404.php');
            }
        } 
    }
?>