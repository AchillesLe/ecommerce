<?php 
    class CategoryController {

        private $view = null;

        function index(){
            $category   = new Category();
            $all        = $category->getAll();
            $this->view = new View( VIEW_URL.'admin/category.php' , 'Categories' , [ 'list' => $all ] );
            $this->view->render();
            exit();
        }

        function insert(){
            if( isset($_POST['name']) ){
                $data = [];
                $category = new Category();
                $data['name'] = post( 'name' ) ;
                $data['slug'] = to_slug( $data['name'] ) ;
                if( isset($_POST['parent_id']) &&  post( 'parent_id' ) != -1 ){
                    $data['parent_id'] = post( 'parent_id' ) ;
                }
                $category->add($data);
            }
            redirect('admin/category');
        }

        function getProducts(){
            $category   = new Category();
            if(isset($_GET['s'])){
                $slug       = get('s');
                $data['products']   = $category->getAllProductBySlug($slug);
            }else{
                $data['products']   = [];
            }
            $data['categories'] =  $category->getAll();
            $this->view = new View( VIEW_URL.'category.php' , 'Products' , $data );
            $this->view->render();
            exit();
        }
                 
    }    
?>
