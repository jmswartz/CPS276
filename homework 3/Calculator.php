<?

class Calculator {
 
function calc($o='',$x=null, $y=null){
//$o='';

 if (is_null($x) || is_null($y)){
  return 'You must enter a string and two numbers<br>';
}

if ($y<1){
    return 'Cannot divide by 0' . '<br>';
    echo'<br>';
}




    if ('+'== $o){
        return $x+$y .'<br>';
        echo'<br>';
    }
    if ('-'== $o){
        return $x-$y . '<br>';
        echo'<br>';
    }
    if ('*'== $o){
        return $x*$y . '<br>';
        
    }
    if ('/'== $o){
    return $x/$y . '<br>';
    echo'<br>';
}

}

}



