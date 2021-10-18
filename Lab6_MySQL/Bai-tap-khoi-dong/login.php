<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>

    <style>
        body {
            background-color: blanchedalmond;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        button {
            background-color: #aa5504d4;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        
        button:hover {
            opacity: 0.8;
        }

        label {
            font-size: 1rem;
            color: indianred;
            font-family: "Berkshire Swash", cursive;
            text-align: center;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 20rem;
            border-radius: 50%;
        }

        .error {
            color: #ffa500ed;
            font-family: "Berkshire Swash", cursive;
        }
    </style>
</head>
<body>
    

    <?php
        $server = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'qlbansua';

        $conn = mysqli_connect($server, $username, $password, $dbname);

        $username = $password = "";

        $error = array();

        $saiTaiKhoanMatKhauErr = "";
        $usernameErr = "";
        $passwordErr = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username)) {
                $usernameErr = "Vui lòng nhập tài khoản!";
                $error[] = $usernameErr;
            }

            if (empty($password)) {
                $passwordErr = "Vui lòng nhập password!";
                $error[] = $passwordErr;
            }

            if (empty($error)) {

                $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

                $result = mysqli_query($conn, $sql);
    
                if (mysqli_num_rows($result) > 0) {
                    header('Location: qlbansua.php');
                } else {
                    $saiTaiKhoanMatKhauErr = "Vui lòng nhập chính xác tài khoản mật khẩu!";
                }

            }
        }
    ?>

    <div class="imgcontainer">
        <img src="./images/loginicon.jpg" alt="Login" class="avatar">
    </div>

    <form action="" method="post">
        <table>
            <tr>
                <td><label><b>Username</b></label></td>
                <td>
                    <input type="text" name="username">
                </td>
                <td>
                    <span class="error">
                        <?php echo $usernameErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td><label><b>Password</b></label> </td>
                <td>
                    <input type="password" name="password">
                </td>
                <td>
                    <span class="error">
                        <?php echo $passwordErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Đăng nhập</button>
                </td>
            </tr>
        </table>
    </form>
    <span class="error"><?php echo $saiTaiKhoanMatKhauErr; ?></span>
</body>
</html>