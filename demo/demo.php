<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.ckeditor.com/4.13.0/full-all/ckeditor.js"></script>
</head>
<body>
    <?php 
        if (isset($_REQUEST['save'])) {
            require 'Submit.php';
            $objSubmit = new Submit();
            $objSubmit->setContent($_REQUEST['editor']);

            if ($objSubmit->save()) {
                echo 'Insert successfully!';
            } else {
                echo 'Failed!';
            }
        }
    ?>
    <form action="" method="post">
        <textarea name="editor" id="editor"></textarea>
        <button type="submit" id="save" name="save">Submit</button>
    </form> 
    
    <script>
        CKEDITOR.replace('editor', {
            uiColor: '#0088ff',
            height: 400,
            removeButtons: 'About,Source,BidiLtr,BidiRtl,Language,Smiley,PageBreak,Print,Save,NewPage,Preview,Form',
        });
    </script>
</body>
</html>