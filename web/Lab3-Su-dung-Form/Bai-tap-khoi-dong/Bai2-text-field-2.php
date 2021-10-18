<!DOCTYPE html>
<html>
<head>
    <title>Input data</title>
</head>
<body>
    <form action="" method="post">
        First Name: <input type="text" name="name[]" 
            value="<?php if (isset($_POST['name'])) echo $_POST['name'][0]; ?>">
        <br>
        Last Name: <input type="text" name="name[]" 
            value="<?php if (isset($_POST['name']))  echo $_POST['name'][1]; ?>">
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php
        if (isset($_POST['name'])) {
            echo "Chào bạn: " . $_POST['name'][0] . " " . $_POST['name'][1];
        }
    ?>

</body>
</html>