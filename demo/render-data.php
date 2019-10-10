<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once('DBConnect.php');
        $db = new DBConnect();
        $dbConn = $db->connect();

        $sql = 'SELECT id, content FROM tbl';
        $result = $dbConn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <div class="main-content">
                <?php echo $row['content']; ?>
            </div>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
    <?php } ?>
</body>
</html>