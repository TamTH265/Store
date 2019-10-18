<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<style>
    .ui-dialog-titlebar {
        background-color: #0055ff;
        background-image: none;
        color: #000;
    }
</style>
<body>  
    <?php 
        require 'Action.php';
        
        if (isset($_REQUEST['id'])) {
            $objAction = new Action();
            $objAction->setId($_REQUEST['id']);
            $item = $objAction->getItemById();
        }
    ?>
    <form action="" method="post" id="form" style="position: relative;">
        <textarea name="editor" id="editor">
            <?php
                echo isset($item[1]) ? $item[1] : '';
            ?>
        </textarea>
        <div id="success-dialog" style="display: none;">Cập nhật dữ liệu thành công!</div>
        <div id="fail-dialog" style="display: none;">Cập nhật dữ liệu thất bại!</div>
        <button type="submit" id="save" name="save">Submit</button>
    </form> 
    
    <script src="https://cdn.ckeditor.com/4.13.0/full-all/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?php 
        if (isset($_REQUEST['save'])) {
            $objAction->setContent($_REQUEST['editor']);
            
            if ($objAction->update()) {
    ?>
    <script>
        $("#success-dialog").dialog({
            draggable: false,
            hide: { effect: "fadeOut", duration: 500 },
            resizable: false,
            position: { my: "left+50% top+100%", at: "center", of: "#editor" },
            show: { effect: "blind", duration: 500 },
            title: 'Thông báo',
        });
        
       
    </script>
    <?php   
                $newUrl = 'render-data.php';
                header('Location: '. $newUrl);
            } else { 
    ?>
    <script>
        $("#fail-dialog").dialog({
            draggable: false,
            hide: { effect: "fadeOut", duration: 500 },
            resizable: false,
            position: { my: "left+50% top+100%", at: "center", of: "#editor" },
            show: { effect: "blind", duration: 500 },
            title: 'Thông báo',
        });
    </script>
    <?php
            }
        }
    ?>
    <script>
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: 'upload.php',
            filebrowserUploadMethod: 'form',
            resize_enabled: false,
            uiColor: '#0088ff',
            width: 800,
            height: 400,
            removeButtons: 'About,Source,BidiLtr,BidiRtl,Language,Smiley,PageBreak,Print,Save,NewPage,Preview,Form',
        });
    </script>
</body>
</html>