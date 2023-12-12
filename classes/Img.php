<?php

class Img{

    private $name, $tmp_name;
    public $new_name;
    public  $allowed = array('jpg', 'jpeg');

    public function __construct(array $img){
        $this->name = $img['name'];
        $this->tmp_name = $img['tmp_name'];
        $ext = pathinfo($this->name, PATHINFO_EXTENSION);
        $this->new_name = uniqid().".".$ext;
    }

    public function upload(){
        move_uploaded_file($this->tmp_name, "../img/products/$this->new_name");
    }



        public function delete($imgName){
        unlink("../images/$imgName");
    }

}