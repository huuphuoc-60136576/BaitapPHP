<html>
<body>
    <form action="listbox.php" method="POST">
        <select name="lunch[]" multiple>
            <option value="pork" selected>
                BBQ Pork Bun
            </option>
            <option value="chicken">
                Chicken Bun
            </option>
            <option value="lotus">
                Lotus Seed Bun
            </option>
        </select>
        <p>
            <input type="submit" name="submit" value="Submit your order">
        </p>
    </form>
    Selected buns: <br>
    <?php
        if (isset($_POST['lunch'])) {
            foreach ($_POST['lunch'] as $choice) {
                print "You want a $choice bun. <br>";
            }
        }
    ?>
</body>
</html>