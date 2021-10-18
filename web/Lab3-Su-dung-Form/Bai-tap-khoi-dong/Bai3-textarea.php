<!DOCTYPE html>
<html>
<head>
    <title>Input/Output data</title>
</head>
<body>
    <form action="" method="post">
        Your comment:
        <br>
        <textarea name="comment" cols="40" rows="3"><?php
            if (isset($_POST['comment'])) echo $_POST['comment'];
        ?></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php
        if (isset($_POST['comment'])) {
            echo "Your comment: " . $_POST['comment'];
        }
    ?>
</body>
</html>