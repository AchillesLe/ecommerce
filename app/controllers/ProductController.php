<?php 
    class ProductController {

        private $view = null;

        function index(){
            $product    = new Product();
            $category   = new Category();
            $data['products']   = $product->getAll();
            $data['categories'] =  $category->getAll();
            $this->view = new View( VIEW_URL.'admin/product.php' , 'Products' , $data  );
            $this->view->render();
            exit();
        }

        function insert(){
            if( isset($_POST['name'],$_POST['des'],$_POST['price'],$_POST['qty']) ){
                $data = [];
                $product   = new Product();
                $data['name']   = post( 'name' ) ;
                $data['des']    = post( 'des' ) ;
                $data['price']  = post( 'price' ) ;
                $data['qty']    = post( 'qty' ) ;
                $data['slug']   = to_slug( $data['name'] ) ;
                if( isset($_POST['category_id']) &&  post( 'category_id' ) != -1 ){
                    $data['category_id'] = post( 'category_id' ) ;
                }
                $product->add($data);
            }
            redirect('admin/product');
        }

                 
    }    
?>
