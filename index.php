<?php
    define( "DS",DIRECTORY_SEPARATOR);
    define( "PROJECT_URL",__DIR__.DS );   
    define( "APP_URL",PROJECT_URL."app".DS );   
    define( "PUB_URL",PROJECT_URL."public".DS );   
    define( "CORE_URL",APP_URL."core".DS ); 
    define( "VIEW_URL",APP_URL."views".DS );
    define( "MODEL_URL",APP_URL."models".DS );
    define( "CONTR_URL",APP_URL."controllers".DS );
   
    $_config =  require_once(CORE_URL.'config.php');
    date_default_timezone_set( $_config['location'] );

    if ( session_status() == PHP_SESSION_NONE ){
        session_start();
    }


    if ( isset( $_SESSION['LAST_ACTIVITY'] ) && ( time() - $_SESSION['LAST_ACTIVITY'] > $_config['timeout_session'] ) ) { 
        session_unset();    
        session_destroy();   
    }
    
    $_SESSION['LAST_ACTIVITY'] = time();
    require_once('vendor/autoload.php');
?> 
