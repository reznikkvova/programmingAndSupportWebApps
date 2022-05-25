<section class="section section-registration">
    <div class="registration-form-wrapper">
        <?php
            if(!empty($_POST) && isset($_POST["login"]) && strlen($_POST["login"]) > 3 && preg_match("/[A-Za-zА-Яа-я0-9-_]/", $_POST["login"])
            && isset($_POST["password"]) && strlen($_POST["password"]) > 7 && preg_match("/[A-Za-zА-Яа-я0-9]/", $_POST["password"]) && isset($_POST["repeat_password"])
            && isset($_POST["email"]) && preg_match('/^[a-zA-Z0-9\.\-_]{2,}@[a-zA-Z0-9\-_]+\.[a-z]{2,3}$/', $_POST["email"])) {
                $mysqli = new mysqli("localhost",
                    "root", "Vovareznik2001",
                    "library");
                if ($mysqli->connect_errno != 0) {
                    die($mysqli->connect_error);
                }

                $_name = $_POST["login"];
                $_pass = password_hash($_POST["password"], PASSWORD_BCRYPT, ['cost' => 12]);;
                $_email = $_POST["email"];
                $_sex = (int)$_POST["sex"];


                $sqlValue = "INSERT INTO users
                (name, email, password, sex) VALUES
                ('$_name', '$_email', '$_pass', '$_sex')";

                if ($mysqli->query($sqlValue) === TRUE) {
                    header("Location:/library/index.php?action=logon_success");
                } else {
                    echo "Error: " . $sqlValue . "<br>" . $mysqli->error;
                    header("Location:/library/index.php?action=registration");
                }

                $mysqli->close();

        } ?>
        <form action="index.php?action=registration" method="post">
            <label for="login">
                Login:
                <input name="login" id="login" type="text" class="label-input">
                <?php if(!empty($_POST)) {
                        if (isset($_POST["login"]) && strlen($_POST["login"]) < 4) {
                            echo "Логін занадто короткий!";
                        } else if(isset($_POST["login"]) && !preg_match("/[A-Za-zА-Яа-я0-9-_]/", $_POST["login"])) {
                            echo "Логін повинен містити лише: латинські та кириличні літери (великі і малі), цифри, нижнє підкреслення та дефіс!";
                        }
                    }

                ?>
            </label>
            <label for="password">
                Password:
                <input name="password" id="password" type="password" class="label-input">
                <?php if(!empty($_POST)) {
                    if (isset($_POST["password"]) && strlen($_POST["password"]) < 7) {
                        echo "Пароль занадто короткий!";
                    } else if(isset($_POST["password"]) && !preg_match("/[A-Za-zА-Яа-я0-9]/", $_POST["password"])) {
                        echo "Пароль може містити: великі та малі літери і цифри";
                    }
                }
                ?>
            </label>
            <label for="repeat_password">
                Repeat password:
                <input name="repeat_password" id="repeat_password" type="password" class="label-input">
                <?php if(!empty($_POST)) {
                    if (isset($_POST["password"]) && isset($_POST["repeat_password"]) && $_POST["password"] != $_POST["repeat_password"]) {
                        echo "Паролі не співпадають!";
                    }
                }
                ?>
            </label>
            <label for="email">
                Email:
                <input name="email" id="email" type="email" class="label-input">
                <?php if(!empty($_POST)) {
                    if (isset($_POST["email"]) && !preg_match('/^[a-zA-Z0-9\.\-_]{2,}@[a-zA-Z0-9\-_]+\.[a-z]{2,3}$/', $_POST["email"])) {
                        echo "Незадовільний email!";
                    }
                }
                ?>
            </label>
            <div class="select_sex">
                <label for="sex_male">
                    <input type="radio" name="sex" id="sex_male" value="0" checked>
                    Male
                </label>
                <label for="sex_female">
                    <input type="radio" name="sex" id="sex_female" value="1">
                    Female
                </label>
            </div>

            <button class="submit-btn" type="submit">Зареєструватись</button>
        </form>
    </div>
</section>