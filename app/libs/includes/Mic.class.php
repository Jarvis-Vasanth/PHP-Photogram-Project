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

  public function __construct($brand)
 {
    printf("constructing object...");
    $this->brand = ucwords($brand);
 }
  
  public function setLight($light){
   $this->light = $light;
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
}