

 <?php

    class standrad{
        private $storage=0;
        private $result;

        function sum ($a, $b) {
            $this->result=  $a + $b;
            return $this->result;
        }

        function sub ($a, $b) {
            $this->result=  $a - $b;
            return $this->result;
        }

        function multi ($a, $b) {
            $this->result=  $a * $b;
            return $this->result;
        }

        function diviton ($a, $b) {
            $this->result=  $a / $b;
            return $this->result;
        }

        function squr( $a) {
            $this->result= $a *$a;
            return $this->result;
        }


        function sqrt( $a) {
             $this->result= sqrt($a);
            return $this->result;
        }

        function set_storage(){
            $this->storage = $this->result;
        }

        function get_storage(){
            if(isset($this->storage)){
                return $this->storage;
            }  
        }

        function clear(){
            $this->storage = 0;
        }

    }

    class scientific extends standrad{

        private $e =2.7182818284590452353602874713527;

        function absolute( $num ) {
            return abs($num);
        }

        function exponation( $a, $b ) {
            return $a ** $b;
        }

        function tenExponatial($a){
            return 10 ** $a;
        }

        function get_e (){
            return $this->e;
        }
        


    }


    // $cal =new standrad();
    // $n=$cal->sum(5,6);
    // echo $n;
    // $cal->set_storage(5,6);
    // $n1=$cal->get_storage(5,6);
    // echo "<br>".$n1;


 ?>