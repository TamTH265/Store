<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        require 'Functions.php';
        if (isset($_REQUEST['id'])) {
            $objFunctions = new Functions();
            $objFunctions->setId($_REQUEST['id']);
            $item = $objFunctions->getItemById();
        }
    ?>
    <div class="container">
        <form action="" method="post" id="form">
            <div class="form-group">
                <label for="title">Title: </label>
                <input class="form-control" id="title" type="text" name="title">
            </div>
           <div class="form-group">
                <label for="imgAddress">Image Address: </label>
                <input class="form-control" id="imgAddress" type="text" name="imgAddress">
           </div>
            <div class="form-group">
                <label for="publicDate">Public Date: </label>
                <input class="form-control" id="publicDate" type="text" name="publicDate">
            </div>
           <div class="form-group">
                <label for="content">Content: </label>
                <textarea name="editor" id="editor">
                <?php
                    echo isset($item[4]) ? $item[4] : '';
                ?>
                </textarea>
           </div>
            <div id="success-dialog" style="display: none;">Dữ liệu đã được lưu thành công!</div>
            <div id="fail-dialog" style="display: none;">Lưu dữ liệu thất bại!</div>
            <button type="submit" class="btn btn-primary" id="update" name="update">Lưu thông tin</button>
        </form> 
    </div>

    <script src="https://cdn.ckeditor.com/4.13.0/full-all/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <?php 
        if (isset($_REQUEST['update'])) {
            $objFunctions->setTitle($_REQUEST['title']);
            $objFunctions->setImgAddress($_REQUEST['imgAddress']);
            $objFunctions->setPublicDate($_REQUEST['publicDate']);
            $objFunctions->setContent($_REQUEST['editor']);
            
            if ($objFunctions->update()) {
    ?>
                <script>
                    $("#success-dialog").dialog({
                        draggable: false,
                        hide: { effect: "fadeOut", duration: 500 },
                        resizable: false,
                        position: { my: "left+50% top+100%", at: "center", of: "#form" },
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
                        position: { my: "left+50% top+100%", at: "center", of: "#form" },
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
            filebrowserUploadUrl: '../DBControl/upload.php',
            filebrowserUploadMethod: 'form',
            resize_enabled: false,
            uiColor: '#0088ff',
            width: 1100,
            height: 400,
            removeButtons: 'About,Source,BidiLtr,BidiRtl,Language,Smiley,PageBreak,Print,Save,NewPage,Preview,Form',
        });
    </script>
</body>
</html>