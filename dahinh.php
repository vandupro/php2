<?php
    class Cha{

        public function dahinh(){
            echo 'abc';
        }
    }

    class Con extends Cha{
        public function dahinh(){
            echo 'xyz';
        }
    }

    $obj = new Con();
    $obj->dahinh();

?>