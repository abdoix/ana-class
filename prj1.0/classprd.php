<?php
  class prd
  {
    private static $cmp = 0;
    public static function getcmp(){
      return self::$cmp;
    }
  
    public static function setcmp($cmp){
      self::$cmp = $cmp;
    }



    private $id;
    public function getId(){
      return $this->id;
    }
  
    public function setId($id){
      $this->id = $id;
    }





    private $name;
    public function getName(){
      return $this->name;
    }
  
    public function setName($name){
      $this->name = $name;
    }







    private $dsc;
    public function getDsc(){
      return $this->dsc;
    }
  
    public function setDsc($dsc){
      $this->dsc = $dsc;
    }





    private $img;
    public function getImg(){
      return $this->img;
    }
  
    public function setImg($img){
      $this->img = $img;
    }







    private $price;
    public function getPrice(){
      return $this->price;
    }
  
    public function setPrice($price){
      $this->price = $price;
    }






    private $qnt=1;
    public function getQnt(){
      return $this->qnt;
    }
  
    public function setQnt($qnt){
      $this->qnt = $qnt;
    }
    private $total;
    public function getTotal(){
      return $this->price * $this->qnt;
    }
  
    public function setTotal($total){
      $this->total = $total;
    }
    public function __construct($id,$name,$dsc,$img,$price)
    {
      prd::$cmp = prd::$cmp + 1;
      $this->id = $id;
      $this->name = $name;
      $this->dsc = $dsc;
      $this->img = $img;
      $this->price = $price;
    }

  }
?>
