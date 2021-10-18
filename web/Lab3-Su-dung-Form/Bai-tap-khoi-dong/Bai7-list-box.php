<!DOCTYPE html>
<html>
<head>
    <title>Làm việc với listbox</title>
</head>
<body>
    <form action="" method="post">
        <select name="lunch[]" multiple>
            <option value="BBQ Pork Bun">
                BBQ Pork Bun
            </option>
            <option value="Chicken Bun">
                Chicken Bun
            </option>
            <option value="Lotus Seed Bun">
                Lotus Seed Bun
            </option>
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php
        echo "Your choice: <br>"; 
        if (isset($_POST['lunch'])) {
            foreach ($_POST['lunch'] as $choice) {
                echo $choice . "<br>";
            }
        }
    ?>
</body>
</html>

<!-- BBQ Pork Bun
    Chicken Bun
    Lotus Seed Bun

-->