<?php

    function call_controller( $controller , $function , $param = [] ){
        if( file_exists( CONTR_URL.$controller.'Controller.php' ) ){
            $controller = trim( $controller ) . 'Controller';
            if (!class_exists($controller)) {
                require_once(CONTR_URL.$controller.".php");
            }
            $class = new $controller;
            $function = trim( $function );
            if( method_exists( $class , $function ) ){
                call_user_func_array( [ $class , $function ] , $param );
            }else{
                $class  = new ErrorController;
                call_user_func_array( [ $class , 'index' ] , $param );
            }
        }else{
            $class = new ErrorController;
            call_user_func_array( [  $class , 'index' ]  , $param );
        }
    }

    function isSecure() {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
                || $_SERVER['SERVER_PORT'] == 443;
    }

    function base_url($url="/"){
        $protocol =  isSecure() == true ? 'https://' : 'http://';
        $domain =  $_SERVER['HTTP_HOST'];
        echo ( $url != "" &&  $url != "/" ) ?  $protocol.$domain."/".$url : $protocol.$domain;
    }

    function get_base_url($url="/"){
        $protocol =  isSecure() == true ? 'https://' : 'http://';
        $domain =  $_SERVER['HTTP_HOST'];
        return ( $url != "" &&  $url != "/" ) ?  $protocol.$domain."/".$url : $protocol.$domain;
    }

    function safe_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    function redirect( $url ){
        $url = get_base_url( $url );
        header("Location: $url");
        exit;
    }

    function _get_config( $name ){
        if( ! isset( $_SESSION['config'] ) ){
            $_SESSION['config'] = require(CORE_URL.'config.php');
        }
        return isset( $_SESSION['config']["$name"] ) ?  $_SESSION['config']["$name"] : "";
    }

    function get_config( $name ){
        if( ! isset( $GLOBALS['_config'] ) ){
            $GLOBALS['_config'] = require(CORE_URL.'config.php');
        }
        return isset( $GLOBALS['_config']["$name"] ) ?  $GLOBALS['_config']["$name"] : "";
    }
 
?>