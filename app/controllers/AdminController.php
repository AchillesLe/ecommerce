<?php 
    class AdminController {

        private $view = null;

        function index(){
            $this->view = new View( VIEW_URL.'admin/index.php' , 'Dashboard' , [] );
            $this->view->render();
            exit();
        }
                 
        private function top_2_largest($array){
            rsort($array);
            return( [ $array[0],$array[1] ] );
        } 

        private function getRepatedOneTime($array){
            $new_arr = array_count_values($array);
            foreach(  $new_arr  as $key => $value ){
                if( $value == 1 ) return $key;
            }
            return null;
        }

        private function getContMoney($const_money,$amount){
            rsort($const_money);
            $result = [];
            foreach($const_money as $money){
                if($amount >= $money){
                    $a = floor( $amount/$money ) ;
                    $amount = $amount%$money;
                    $result[$money] = $a ;
                }
            }
            return $result;
        }

        public function test1(){
            $array = [0, 6, 100, 46, 47];
            print_r($this->top_2_largest($array) ) ;            
        }

        public function test2(){
            $array = [4, 8, 9, 5, 8, 9, 4, 1, 9, 5];
            print_r( $this->getRepatedOneTime($array) );exit();
        }

        public function test3(){
            $const_money = [50, 10, 5, 1];
            $amount = 2018;
            
            
            $result = $this->getContMoney($const_money,$amount);
            if( $result ){
                foreach( $result as $key => $value ){
                    print_r( "$value x $$key".PHP_EOL ) ;
                }
                exit();
            }else{
                echo "No result";exit();
            }
        }

    }    
?>
