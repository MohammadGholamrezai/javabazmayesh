<?php
namespace App\lib;
use Session;
class Captcha
{
  public function create()
  {
    $word='';
    $letters='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $len=strlen($letters);
    for($i=0;$i<5;$i++)
    {
      $letter=$letters[rand(0, $len-1)];
      $word.=$letter;
    }
    Session::put('Captcha', $word);
    $image=imagecreatefrompng('images/captcha.png');
    $font_size=50;
    $text_color= imagecolorallocate($image,0,0,0);
    imagettftext($image, $font_size,2,140,75, $text_color,'fonts/2.ttf', $word);
    header("content-type:image/png");
    imagepng($image);

  }
}
 ?>
