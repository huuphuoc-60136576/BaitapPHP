<html>
<body>
    <form action="combobox.php" method="post">
        <select name="lunch">
            <option value="pork" <?php if (isset($_POST['lunch']) && $_POST['lunch'] == 'pork') echo "selected"; else echo "" ?>>
                BBQ Pork Bun
            </option>
            <option value="chicken" <?php if (isset($_POST['lunch']) && $_POST['lunch'] == 'chicken') echo "selected"; else echo "" ?>>
                Chicken Bun
            </option>
            <option value="lotus" <?php if (isset($_POST['lotus']) && $_POST['lunch'] == 'lotus') echo "selected"; else echo "" ?>>
                Lotus Seed Bun
            </option>
            <input type="submit" name="submit" value="Submit your order"> <br>
        </select>
        Selected buns: <br>
        <?php
            if (isset($_POST['lunch'])) {
                print 'You want a ' . $_POST['lunch'] . ' bun'. '<br>';
            }
        ?>
    </form>
</body>
</html>