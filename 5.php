<?php
/**
<p>5. Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.
 * Директория и искомое слово задаются как параметры функции.</p>
 */
function search_dir($dir,$word){
    $arr=(scandir($dir));
    for ($i = 0; $i < count($arr); $i++) {
        $pos=strpos($arr[$i],$word);
        if($pos!==false){
            $result[]=$arr[$i];
        }
    }return $result;
}
print_r(search_dir(__DIR__,'mag'));
?>