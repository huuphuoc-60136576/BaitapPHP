<html>
<head>
    <title>Check box</title>
</head>
<body>
    <form action="checkbox.php" name="myform" method="post">
        <input type="checkbox" name="ck1" value="en" 
            <?php if (isset($_POST['ck1']) && $_POST['ck1'] == "en") echo "checked"; else echo "" ?>> English
        <br>
        <input type="checkbox" name="ck2" value="vi" 
            <?php if (isset($_POST['ck2']) && $_POST['ck2'] == "vi") echo "checked"; else echo "" ?>> VietNam
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php
        if (isset($_POST['ck1']) && $_POST['ck1'] == "en") echo "checkbox 1: " . $_POST['ck1'] . "<br>";
        if (isset($_POST['ck2']) && $_POST['ck2'] == "vi") echo "checkbox 2: " . $_POST['ck2'];
    ?>
</body>
</html>