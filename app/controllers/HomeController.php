<?php 
    class HomeController {
        public $view = null;
        function index(){
            $product    = new Product();
            $category   = new Category();
            $data['products']   = $product->getAll();
            $data['categories'] =  $category->getAll();
            $this->view = new View( VIEW_URL.'index.php' , 'Home' , $data );
            $this->view->render();
            exit();
        }

        function category(){
            $product    = new Product();
            $category   = new Category();
            $data['products']   = $product->getAll();
            $data['categories'] =  $category->getAll();
            $this->view = new View( VIEW_URL.'index.php' , 'Home' , $data );
            $this->view->render();
            exit();
        }
    }    
?>
