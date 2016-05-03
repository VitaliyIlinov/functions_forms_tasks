<?php
/**
<p>6. Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные фото должны 
 * помещаться в папку gallery и выводиться на странице в виде таблицы.</p>
 */
define('ALLOWS_TYPE',[
    'image/png'=>'png',
    'image/jpeg'=>'jpg'
]);
function save_name($data){
    return file_put_contents('name_image.txt',serialize($data));
}
function get_name(){
    return unserialize(file_get_contents('name_image.txt'));
}
if (file_exists('name_image.txt')){
    $result=get_name();
}
$form_was_send=false;
if (isset($_POST['submit'])){
    $form_was_send=true;
    if(is_dir('gallery')==false){
        if(mkdir('gallery')==false){
            throw new Error('Didnt create folder;');
        };
    }
//    echo "<pre>";
//    var_dump($_FILES);
//    echo "</pre>";

    foreach ($_FILES["photo"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $allow_type=ALLOWS_TYPE[$_FILES['photo']['type'][$key]];
            if(!isset($allow_type)){
                throw new Error('PLEASE IMAGE;');
            }
            $tmp_name = $_FILES["photo"]["tmp_name"][$key];
            $name = $_FILES["photo"]["name"][$key].time();
            move_uploaded_file($tmp_name, 'gallery'.DIRECTORY_SEPARATOR.$name);
        }else{
            throw new Error('PLEASE select file;');
        }
        $result[]=$name;
    }
     save_name($result);
    

//    echo "<pre>";
//    print_r($result);
//    echo "</pre>";
}

include '6.html';