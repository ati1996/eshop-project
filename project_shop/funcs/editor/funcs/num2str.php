<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php 


$fn1=array('','یک','دو','سه','چهار','پنج','شش','هفت','هشت','نه','ده','یازده','دوازده','سیزده','چهارده','پانزده','شانزده','هفده','هیجده','نوزده','بیست');
$fn2=array('','','بیست','سی','چهل','پنجاه','شصت','هفتاد','هشتاد','نود','صد');
$fn3=array('','صد','دویست','سیصد','چهارصد','پانصد','ششصد','هفتصد','هشتصد','نهصد','هزار');
function num2str($n)
{
        global $fn1, $fn2, $fn3;
    $n=''.$n;
    if($n<21)
        return $fn1[$n];
    if($n<101)
        return $fn2[$n[0]].' و '.num2str($n[1]);
    if($n<1001)
        return $fn3[$n[0]].' و '.num2str(substr($n,1));
    if($n<1000000)
        return num2str(substr($n,0,-3)).' هزار و '.num2str(substr($n,-3));
    if($n<1000000000)
        return num2str(substr($n,0,-6)).' میلیون و '.num2str(substr($n,-6));
    if($n<1000000000000)
        return num2str(substr($n,0,-9)).' میلیارد و '.num2str(substr($n,-9));
    return 'ما سوادمون به این عدد نمیرسه :دی';
}

//echo num2str(123453);



function num2str2($money)
{    
    $one = array(
        'صفر',
        'یک',
        'دو',
        'سه',
        'چهار',
        'پنج',
        'شش',
        'هفت',
        'هشت',
        'نه');
    $ten = array(
        '',
        'ده',
        'بیست',
        'سی',
        'چهل',
        'پنجاه',
        'شصت',
        'هفتاد',
        'هشتاد',
        'نود',
    );
    $hundred = array(
        '',
        'یکصد',
        'دویست',
        'سیصد',
        'چهارصد',
        'پانصد',
        'ششصد',
        'هفتصد',
        'هشتصد',
        'نهصد',
    );
    $categories = array(
        '',
        'هزار',
        'میلیون',
        'میلیارد',
    );
    $exceptions = array(
        '',
        'یازده',
        'دوازده',
        'سیزده',
        'چهارده',
        'پانزده',
        'شانزده',
        'هفده',
        'هجده',
        'نوزده',
    );
    
    if(strlen($money) > count($categories)){
        throw new Exception('number is longger!');
    }
    
    $letters_separator = ' و ';
    $money = (string)(int)$money;
    $money_len = strlen($money);
    $persian_letters = '';
    
    for($i=$money_len-1; $i>=0; $i-=3){
        $i_one = (int)isset($money[$i]) ? $money[$i] : -1;
        $i_ten = (int)isset($money[$i-1]) ? $money[$i-1] : -1;
        $i_hundred = (int)isset($money[$i-2]) ? $money[$i-2] : -1;
        
        $isset_one = false;
        $isset_ten = false;
        $isset_hundred = false;
        
        $letters = '';
        
        // zero
        if($i_one == 0 && $i_ten < 0 && $i_hundred < 0){
            $letters = $one[$i_one];
        }
        
        // one
        if(($i >= 0) && $i_one > 0 && $i_ten != 1 && isset($one[$i_one])){
            $letters = $one[$i_one];
            $isset_one = true;
        }
        
        // ten
        if(($i-1 >= 0) && $i_ten > 0 && isset($ten[$i_ten])){
            if($isset_one){
                $letters = $letters_separator.$letters;
            }
            
            if($i_one == 0){
                $letters = $ten[$i_ten];
            }            
            elseif($i_ten == 1 && $i_one > 0){
                $letters = $exceptions[$i_one];
            }
            else{
                $letters = $ten[$i_ten].$letters;
            }
            
            $isset_ten = true;
        }
        
        // hundred
        if(($i-2 >= 0) && $i_hundred > 0 && isset($hundred[$i_hundred])){
            if($isset_ten || $isset_one){
                $letters = $letters_separator.$letters;
            }
            
            $letters = $hundred[$i_hundred].$letters;
            $isset_hundred = true;
        }
        
        if($i_one < 1 && $i_ten < 1 && $i_hundred < 1){
            $letters = '';
        }
        else{
            $letters .= ' '.$categories[($money_len-$i-1)/3];
        }
        
        if(!empty($letters) && $i >= 3){
            $letters = $letters_separator.$letters;
        }
        
        $persian_letters = $letters.$persian_letters;
    }
    
    return $persian_letters;
} 
?>