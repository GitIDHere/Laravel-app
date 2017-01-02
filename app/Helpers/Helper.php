<?php
namespace App\Helpers;


class Helper{


  public static function ellipsis($string){
      return str_limit($string, 80);
  }

  public static function displayMoneyFormat($money){
    return number_format(($money / 100), 2);
  }

  public static function dbMoneyFormat($money){
      return ($money * 100);
  }



}
