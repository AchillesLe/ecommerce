<?php 
    class CategoryController {

        private $view = null;

        function index(){
            $category = new Category();
            $all = $category->getAll();
            $this->view = new View( VIEW_URL.'admin/category.php' , 'Category' , [ 'list' => $all ] );
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

        function update(){
            if( isset($_POST['name'],$_POST['id']) ){
                $data = [];
                $category = new Category();
                $id = post('id');
                $data['name'] = post('name');;
                $data['slug'] = to_slug( $data['name'] ) ;
                $category->edit($data,$id);
            }
            redirect('admin/category');
        }
                 
    }    
?>
