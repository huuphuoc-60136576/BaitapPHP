<html>
<head>
    <title>Input/Output data</title>
</head>
<body>
    <form action="input_xuly.php" name="myform" method="post">
        Your name: <input type="text" name="Name" size="20" value="<?php if(isset($_POST['Name'])) echo $_POST['Name']; ?>">
        <br>
        <input type="submit">
    </form>
    <?php
        if (isset($_POST['Name']))
            echo "Hello " . $_POST['Name'];
    ?>
</body>
</html>