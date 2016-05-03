<?php
/**
 *<p>2. Создать форму с элементом textarea. При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте. Реализовать с помощью функции.</p>
 * 1.разделить строку на слова
 * 2.узнать длину значений массива         //$b[]=mb_strlen($a[$i]);
 *
 */
include '2.html';
$a=$_POST['a'];
//$a = 'qwerrrr 123456789 qwert qwerty';
function leght_top_three($a)
{
    $a = explode(' ', $a);
    // print_r($a);
    for ($i = 0; $i < count($a); $i++) {
        for ($j = 0; $j < count($a)-1; $j++) {
            if (mb_strlen($a[$j])>mb_strlen($a[$j+1])){
                $c=$a[$j];
                $a[$j]=$a[$j+1];
                $a[$j+1]=$c;
            }
        }
    }
    return (array_slice($a, 0, 3));
}

print_r(leght_top_three($a));