<?php 
    class CategoryController {

        private $view = null;

        function index(){
            $category = new Category();
            $all = $category->getAll();
            $this->view = new View( VIEW_URL.'admin/category.php' , 'Category' , [ 'list'=>$all ] );
            $this->view->render();
            exit();
        }

        function insert(){
            $category = new Category();
            redirect('admin/category');
        }
                 
    }    
?>
