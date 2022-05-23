<section class="section section-registration">
    <div class="registration-form-wrapper">
        <?php
        if(!empty($_POST) && isset($_POST["login"]) && isset($_POST["password"])) {
            $mysqli = new mysqli("localhost",
                "root", "Vovareznik2001",
                "library");

            if ($mysqli->connect_errno != 0) {
                die($mysqli->connect_error);
            }

            $_name = $_POST["login"];
            $_pass = $_POST["password"];
            $query = 'SELECT * FROM users WHERE name="'.$_name.'"';

            if (!empty($query) && password_verify($_pass, mysqli_fetch_assoc($mysqli->query($query))["password"])) {
                $_SESSION['auth'] = true;
                $_SESSION['id'] = mysqli_fetch_assoc($mysqli->query($query))["id"];
                $_SESSION['admin'] = mysqli_fetch_assoc($mysqli->query($query))["admin"];

                header("Location:http://localhost/library/index.php?action=main");
            } else {
                header("Location:http://localhost/library/index.php?action=login");
            }

        } ?>
        <form action="index.php?action=login" method="post">
            <label for="login">
                Login:
                <input name="login" id="login" type="text" class="label-input">
            </label>
            <label for="password">
                Password:
                <input name="password" id="password" type="password" class="label-input">
            </label>

            <button class="submit-btn" type="submit">Увійти</button>
        </form>
    </div>
</section>