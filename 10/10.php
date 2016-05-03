<?php
/**
<p>10. Написать функцию, которая считает количество уникальных слов в тексте. Слова разделяются пробелами.
 * Текст должен вводиться с формы.</p>
 */
//$a='Hello world! hello world';

function unique($arg){
    $b=explode(' ',mb_strtolower($arg));
    echo 'Всего слов - '.count($b);
    $b=array_unique($b);
    echo '; Уникальных слов - '.count($b);
}
include '10.html';
unique($_POST['text']);