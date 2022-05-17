<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyBook</title>

    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
    <body>
            <?php
                require_once('./layout/header.php');
            ?>
            <section class="content">
                <div class="container">
                    <div class="body-wrapper">
                        <?php
                            if($_GET["action"] !== 'logon') {
                                require_once('./layout/sidebar.php');
                            }

                            if(isset($_GET["action"]) && file_exists("./views/" . $_GET["action"] . ".php")) {
                                require_once("./views/" . $_GET["action"] . ".php");
                            }
                            else {
                                 require_once("views/main.php");
                            }
                        ?>
                    </div>
                </div>
            </section>
            <?php
                require_once('./layout/footer.php');
            ?>
    </body>
</html>