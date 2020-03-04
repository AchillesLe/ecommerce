<?php 

    class ErrorController {
        public $view = null;

        function index(){
            $this->view = new View( VIEW_URL.'404.php' , 'Not found page');
            $this->view->render();
            exit();
        }
    }
?>