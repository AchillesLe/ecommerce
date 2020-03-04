<?php
    $request_uri = explode('?', $_SERVER['REQUEST_URI']);
    $url = $request_uri[0];
    $sections =   explode('/',  $request_uri[0] );
    $section = "";

    if( count ($sections) > 1){
        $section = $sections[1];
    }

    if( $_SERVER['REQUEST_METHOD'] == 'GET'){

        if( $section === "admin" ){ 
            switch( $url ){
                case "/admin": call_controller ( 'Admin', 'index'  ); break;
                case "/admin/category":   call_controller ( 'Category','index'  ); break;
                case "/admin/product":   call_controller ( 'Product','index'  ); break;

                case "/admin/test-1":   call_controller ( 'Admin','test1'  ); break;
                case "/admin/test-2":   call_controller ( 'Admin','test2'  ); break;
                case "/admin/test-3":   call_controller ( 'Admin','test3'  ); break;
                default: call_controller( 'Error' , 'index'  );break;
            }

        } else{
            switch( $url ){ 
                case "/":   call_controller ( 'Home','index'  ); break;
                
                default: call_controller( 'Error' , 'index'  );break;
            }

        }

    }else if( $_SERVER['REQUEST_METHOD'] == 'POST'){ 

        if( $section === "admin" ){ 

            switch( $url ){
                case "/admin/add-category":  call_controller ( 'Category', 'insert'  ); break;
                case "/admin/add-product":  call_controller ( 'Product', 'insert'  ); break;
                
                default: call_controller( 'Error' , 'index'  );break;
            }

        } else{
            switch( $url ){ 
                case "/login":   call_controller ( 'Home','doLogin'  ); break;

                default: call_controller( 'Error' , 'index'  );break;
            }
            
        }
    }
    exit();
        
?>