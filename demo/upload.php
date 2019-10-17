<?php
    if (isset($_FILES['upload']['name'])) {
        $file = $_FILES['upload']['tmp_name'];
        $file_name = $_FILES['upload']['name'];
        $file_name_array = explode('.', $file_name);
        $extension = end($file_name_array);
        $new_image_name = rand() . '.' . $extension;
        chmod('../upload', 0777);
        $allowed_extension = array('jpg', 'png', 'gif', 'jpeg');
        echo 'Success';
        if (in_array($extension, $allowed_extension)) {
            $upload_path = '../upload/' . $new_image_name;
            move_uploaded_file($file, $upload_path);
            $CKEditorFuncNum  = $_GET['CKEditorFuncNum'];
            $message = '';
            echo '<script type=\'text/javascript\'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, \'$url\', \'$message\');</script>';
        }
    }
?>