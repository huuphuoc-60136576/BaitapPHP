<!DOCTYPE html>
<html>
<head>
    <title>Làm việc với checkbox</title>
</head>
<body>
    <form action="" method="post">
        <input type="checkbox" name="ck1" value="Việt Nam" 
            <?php if (isset($_POST['ck1'])) echo "checked"; ?>> Việt Nam
        <input type="checkbox" name="ck2" value="Anh Quốc" 
            <?php if (isset($_POST['ck2'])) echo "checked"; ?>> Anh Quốc
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php
        if (isset($_POST['ck1'])) echo "Checkbox 1: " . $_POST['ck1'];
        echo "<br>";
        if (isset($_POST['ck2'])) echo "Checkbox 2: " . $_POST['ck2'];
    ?>
</body>
</html>