<?php

for($i = 1; $i <= 16; $i++){
    $rand = mt_rand(33, 126);
while ($rand == 60 || $rand == 43){
     $rand = mt_rand(33, 126);
}
   
    
    $str .= chr($rand);
    echo '<br>rand = ' . $rand;
    echo '<br>str = ' . $str;
}
echo '<br>str = ' . $str;
echo '<br>' . strlen($str);

