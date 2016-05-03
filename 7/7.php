<?php
/**
<p>7. Создать гостевую книгу, где любой человек может оставить комментарий в
 * текстовом поле и добавить его. Все добавленные комментарии выводятся над текстовым полем.</p>
 */
function save_comments($comment){
    return file_put_contents('comments.txt',serialize($comment));
}
function get_comments(){
   return unserialize(file_get_contents('comments.txt'));
}
if (file_exists('comments.txt')){
    $comments=get_comments();
}

$form_was_send=false;

if (isset($_POST['submit'])){
    $form_was_send=true;
    $comment=[
        'user'=>$_POST['user'],
        'comment'=>$_POST['comment']
    ];
    if ($_POST['user']==null or $_POST['comment']==null){
        throw new Error('Enter comment or your user;');
    }
    $comments[]=$comment;
    save_comments($comments);
//    echo "<pre>";
//    print_r($comments);
//    echo "</pre>";
}
include '7.html';