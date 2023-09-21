<?php 

/** 
* Acess Specifiers
* ----------------
* public
* private
* protected
*/


class Mic
{
  private $brand;
  public $color;
  public $usb_port;
  public $model;
  private $light;
  public $price;

  public static function testFunction()
  {
    printf("This is a static function, this can be run without object initialization.");
  }

  public function __construct($brand)
 {
    printf("constructing object...");
    $this->brand = ucwords($brand);
 }
  
  public function setLight($light){
   $this->light = $light;
  }

  public function getBrand()
  {
    return $this->brand;
  }

  private function getModel()
  {
    return $this->model;
  }

  public function setModel($model)
  {
    $this->model = ucwords($model);
  }

  public function getModelProxy()
  {
    return $this->getModel();
  }

  public function __destruct()
  {
    printf("Destruct object: brand: $this->brand...");
  }

}