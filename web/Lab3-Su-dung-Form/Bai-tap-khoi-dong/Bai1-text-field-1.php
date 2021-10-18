<html>
<head>
    <title>Input/Output data</title>
</head>
<body>
    <form action="" method="post">
        Your Name: <input type="text" name="name" size="20" 
            value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
        <input type="submit" value="Submit">
    </form>

    <?php
        if (isset($_POST['name'])) {
            print "Hello " . $_POST['name'];
        }
    ?>
</body>
</html>