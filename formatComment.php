<?php 

function formatComment($comment){
    $comment = str_replace("'", "\'", $comment);
    $comment = str_replace('"', '\"', $comment);
    $comment = str_replace("$", "\$", $comment);
    return $comment;
}


?>