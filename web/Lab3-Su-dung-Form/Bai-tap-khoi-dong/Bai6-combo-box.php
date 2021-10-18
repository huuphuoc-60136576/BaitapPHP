<!DOCTYPE html>
<html>
<head>
    <title>Làm việc với combobox</title>
</head>
<body>
    
    <form action="" method="post">
        <select name="lunch">
            <option value="BBQ Pork Bun"
                <?php if (isset($_POST['lunch']) && $_POST['lunch'] == "BBQ Pork Bun") echo "selected"; ?>>
                BBQ Pork Bun
            </option>
            <option value="Chicken Bun"
                <?php if (isset($_POST['lunch']) && $_POST['lunch'] == "Chicken Bun") echo "selected"; ?>>
                Chicken Bun
            </option>
            <option value="Lotus Seed Bun"
                <?php if (isset($_POST['lunch']) && $_POST['lunch'] == "Lotus Seed Bun") echo "selected"; ?>>
                Lotus Seed Bun
            </option>
        </select>

        <input type="submit" value="Submit">
    </form>

    <?php
        if (isset($_POST['lunch'])) echo "You want " . $_POST['lunch'];
    ?>
</body>
</html>