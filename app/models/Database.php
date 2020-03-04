<?php 
    
    class Database {
        private $host = "";
        private $dbname = "";
        private $username = "";
        private $password = "";
        private $port = "";
        public $db = null;

        function __construct(){
            $this->host = get_config('db_host');
            $this->dbname = get_config('db_name');
            $this->username = get_config('db_username');
            $this->password = get_config('db_password');
            $this->port = get_config('db_port');
        }

        function open_conn(){
            try{
                if( !isset($GLOBALS['_config']['connection']) || !empty($GLOBALS['_config']['connection']) ){
                    $GLOBALS['_config']['connection'] =  new \PDO("mysql:host=$this->host;dbname=$this->dbname;port=$this->port", $this->username , $this->password );
                }
                $this->db = $GLOBALS['_config']['connection'];
                // $this->db =  new \PDO("mysql:host=$this->host;dbname=$this->dbname;port=$this->port", $this->username , $this->password );
                $this->db->exec("set names utf8");
                return $this->db;
            }catch( PDOException $e ){
                die("Can't connect to database !");exit();
            }
        }
        
        function close_conn(){
            // $this->db = null;
        }

        function query( $query ){
            try{
                $result = [];
                $this->open_conn();
                $stmt = $this->db->query( $query );
                if( $stmt ){
                    while ( $row = $stmt->fetch(\PDO::FETCH_ASSOC) ){
                        $result[] = $row;
                    }
                }
                $this->close_conn();
                return $result;
            }catch(Exception $e){
                return [];
            }
        } 

        public function update( $table , $data , $condition ){
            try {
                $row_data = "";
                $row_condition = "";
                foreach( $data as $key=>$val ){
                    $row_data .= $key." = ?,";
                }
                $row_data = rtrim($row_data,",");

                foreach( $condition as $key1=>$val1 ){
                    $row_condition .= " ".$key1."=? AND";
                }
                $row_condition = substr ($row_condition,0,-3);
                $query = "UPDATE $table SET $row_data WHERE $row_condition";
                $arr_data = array_values($data);
                $arr_condition = array_values($condition);
                $arr = array_merge($arr_data,$arr_condition);

                $this->open_conn();
                $stm = $this->db->prepare( $query );
                $success = false;
                if ( $stm->execute($arr) ){
                    $success = true;
                }
                $this->close_conn();
                return $success ;
            } catch (Exception $e) {
                $error_message =  'Caught exception: ' . $e->getMessage();
                file_put_contents(PROJECT_URL.'log/query_log.txt', $error_message ,FILE_APPEND | LOCK_EX);
                return false;
            }
        }

        public function update_return_rows( $table , $data , $condition ){
            try {
                $row_data = "";
                $row_condition = "";
                foreach( $data as $key=>$val ){
                    $row_data .= $key." = ?,";
                }
                $row_data = rtrim($row_data,",");

                foreach( $condition as $key1=>$val1 ){
                    $row_condition .= " ".$key1."=? AND";
                }
                $row_condition = substr ($row_condition,0,-3);
                $query = "UPDATE $table SET $row_data WHERE $row_condition";
                $arr_data = array_values($data);
                $arr_condition = array_values($condition);
                $arr = array_merge($arr_data,$arr_condition);

                $this->open_conn();
                $stm = $this->db->prepare( $query );
                $success = false;
                if ( $stm->execute($arr) ){
                    $success = $stm->rowCount(); 
                }
                $this->close_conn();
                return $success ;
            } catch (Exception $e) {
                $error_message =  'Caught exception: ' . $e->getMessage();
                file_put_contents(PROJECT_URL.'log/query_log.txt', $error_message ,FILE_APPEND | LOCK_EX);
                return -1;
            }
        }

        public function insert( $table , $data ){
            $row_colum = "";
            $row_data = "";
            $success = false;
            try {
                foreach( $data as $key => $val ){
                    $row_colum .= $key.",";
                }
                $row_colum = substr($row_colum,0,-1);
                foreach( $data as $key => $val ){
                    $row_data .= "?,";
                }
                $row_data = substr($row_data,0,-1);
                $query = "INSERT INTO $table ($row_colum) VALUES($row_data)";
                $arr = array_values($data);
                $this->open_conn();
                $stm = $this->db->prepare( $query );
               
                if ( $stm->execute($arr) ){
                    $success = true;
                }
                $this->close_conn();
                return $success ;
            } catch (Exception $e) {
                $error_message =  'Caught exception: ' . $e->getMessage();
                file_put_contents(PROJECT_URL.'log/query_log.txt', $error_message ,FILE_APPEND | LOCK_EX);
                return false;
            }
        }

        public function insertGetLastId($table , $data){
            $row_colum = "";
            $row_data = "";
            try {
                foreach( $data as $key => $val ){
                    $row_colum .= $key.",";
                }
                $row_colum = substr($row_colum,0,-1);
                foreach( $data as $key => $val ){
                    $row_data .= "?,";
                }
                $row_data = substr($row_data,0,-1);
                $query = "INSERT INTO $table ($row_colum) VALUES($row_data)";
                $arr = array_values($data);
                $this->open_conn();
                $stm = $this->db->prepare( $query );
                $id = null;
                if ( $stm->execute($arr) ){
                    $id  = $this->db->lastInsertId();
                }
                $this->close_conn();
                return $id ;

            } catch (Exception $e) {
                $error_message =  'Caught exception: ' . $e->getMessage();
                file_put_contents(PROJECT_URL.'log/query_log.txt', $error_message ,FILE_APPEND | LOCK_EX);
                return false;
            }
        }

        public function insertMulti($table , $data){
            $row_colum = "";
            $row_data = "";
            $success = false;
            try {
                foreach( $data[0] as $key => $val ){
                    $row_colum .= $key.",";
                }
                $row_colum = substr($row_colum,0,-1);
                $arr = [];
                foreach( $data as $key1 => $val1 ){
                    foreach ($val1 as $key2 ) {
                       array_push( $arr , $key2 );
                    }
                    $row_data .= "(".substr( str_repeat("?,", count($val1) ),0,-1 )."),";
                }
                $row_data = substr($row_data,0,-1);
                $query = "INSERT INTO $table ($row_colum) VALUES  $row_data";
               
                $this->open_conn();
                $stm = $this->db->prepare( $query );
               
                if ( $stm->execute($arr) ){
                    $success = true;
                }
                $this->close_conn();
                return $success ;
            } catch (Exception $e) {
                $error_message =  'Caught exception: ' . $e->getMessage();
                file_put_contents(PROJECT_URL.'log/query_log.txt', $error_message ,FILE_APPEND | LOCK_EX);
                return false;
            }
        }

        public function delete( $table , $condition ){
            try {
                $row_condition = "";
                foreach( $condition as $key1=>$val1 ){
                    $row_condition .= " ".$key1."? AND";
                }
                $row_condition = substr ($row_condition,0,-3);
                if(  $row_condition == false ){
                    $query = "DELETE FROM $table WHERE 1=2 ";
                }else{
                    $query = "DELETE FROM $table WHERE $row_condition";
                }
                $arr_condition = array_values($condition);
                $this->open_conn();
                $stm = $this->db->prepare( $query );
                $success = false;
                if ( $stm->execute($arr_condition) ){
                    $success = true;
                }
                $this->close_conn();
                return $success ;
            } catch (Exception $e) {
                $error_message =  'Caught exception: ' . $e->getMessage();
                file_put_contents(PROJECT_URL.'log/query_log.txt', $error_message ,FILE_APPEND | LOCK_EX);
                return false;
            }
        }

        public function select_one( $table , $selects , $condition ){
            try {
                $row_select = "";
                if( count($selects) == 0 ) $row_select = "*";
                else $row_select = implode(",",$selects);
                $row_condition = "";
                foreach( $condition as $key1=>$val1 ){
                    $row_condition .= " ".$key1."= ? AND";
                }
                $row_condition = substr ($row_condition,0,-3);
                if(  $row_condition == false ){
                    $query = "SELECT $row_select FROM $table";
                }else{
                    $query = "SELECT $row_select FROM $table WHERE $row_condition";
                }
                $arr_condition = array_values($condition);
                $this->open_conn();
                $stm = $this->db->prepare( $query );
                $result = [];
                if ( $stm->execute($arr_condition) ){
                    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                    $result = count($result) > 0 ? $result[0] : [];
                }
                $this->close_conn();
                return $result ;
            } catch (Exception $e) {
                $error_message =  'Caught exception: ' . $e->getMessage();
                file_put_contents(PROJECT_URL.'log/query_log.txt', $error_message ,FILE_APPEND | LOCK_EX);
                return [];
            }
        }

        public function select_multi( $table , $selects , $condition ){
            try {
                $row_select = "";
                if( count($selects) == 0 ) $row_select = "*";
                else $row_select = implode(",",$selects);
                $row_condition = "";
                foreach( $condition as $key1=>$val1 ){
                    $row_condition .= " ".$key1."=? AND";
                }
                $row_condition = substr ($row_condition,0,-3);
                if(  $row_condition == false ){
                    $query = "SELECT $row_select FROM $table";
                }else{
                    $query = "SELECT $row_select FROM $table WHERE $row_condition";
                }
                $arr_condition = array_values($condition);
                $result = [];
                $this->open_conn();
                $stm = $this->db->prepare( $query );
                if ( $stm->execute($arr_condition) ){
                    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                }
                $this->close_conn();
                return $result ;
            } catch (Exception $e) {
                $error_message =  'Caught exception: ' . $e->getMessage();
                file_put_contents(PROJECT_URL.'log/query_log.txt', $error_message ,FILE_APPEND | LOCK_EX);
                return [];
            }
        }
    }
?>