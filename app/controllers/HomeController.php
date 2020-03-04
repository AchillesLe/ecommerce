<?php 
    class HomeController {
        public $view = null;
        function index(){
            $this->view = new View( VIEW_URL.'index.php' , 'Home' , [] );
            $this->view->render();
            exit();
        }
    }    
?>
