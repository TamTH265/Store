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
    <form action="" method="post" id="form" style="position: relative;">
        <textarea name="editor" id="editor"></textarea>
        <div id="success-dialog" style="display: none;">Dữ liệu đã được lưu thành công!</div>
        <div id="fail-dialog" style="display: none;">Lưu dữ liệu thất bại!</div>
        <button type="submit" id="save" name="save">Submit</button>
    </form> 
    
    <script src="https://cdn.ckeditor.com/4.13.0/full-all/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?php 
        if (isset($_REQUEST['save'])) {
            require 'Action.php';
            $objSubmit = new Action();
            $objSubmit->setContent($_REQUEST['editor']);
            
            if ($objSubmit->create()) {
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
            uiColor: '#0088ff',
            width: 800,
            height: 400,
            removeButtons: 'About,Source,BidiLtr,BidiRtl,Language,Smiley,PageBreak,Print,Save,NewPage,Preview,Form',
        });
    </script>
</body>
</html>