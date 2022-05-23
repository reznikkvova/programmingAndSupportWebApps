<section class="section section-registration">
    <div class="registration-form-wrapper">
        <?php
        if(!empty($_POST) && isset($_POST["book_name"]) && isset($_POST["book_author"]) && isset($_POST["book_description"]) && isset($_POST["book_img"])) {
            $mysqli = new mysqli("localhost",
                "root", "Vovareznik2001",
                "library");

            if ($mysqli->connect_errno != 0) {
                die($mysqli->connect_error);
            }

            $_user_id = $_SESSION['id'];
            $_is_user_admin = isset($_SESSION['auth']) && $_SESSION['admin'] ? 1 : 0;
            $_book_name = $_POST["book_name"];
            $_book_author = $_POST["book_author"];
            $_book_description = $_POST["book_description"];
            $_book_img = $_POST["book_img"];

            $sqlValue = "INSERT INTO books
                (visible, author , book_name, book_author, book_description, book_img) VALUES
                ('$_is_user_admin', '$_user_id', '$_book_name', '$_book_author', '$_book_description', '$_book_img')";

            if ($mysqli->query($sqlValue) === TRUE) {
                header("Location:http://localhost/library/index.php?action=books");
            } else {
                echo "Error: " . $sqlValue . "<br>" . $mysqli->error;
                header("Location:http://localhost/library/index.php?action=create_book");
            }

            $mysqli->close();


        } ?>
        <form action="index.php?action=create_book" method="post">
            <h3>Додати книгу</h3>
            <label for="book_name">
                Назва книги:
                <input name="book_name" id="book_name" type="text" class="label-input">
            </label>
            <label for="book_author">
                Автор книги:
                <input name="book_author" id="book_author" type="text" class="label-input">
            </label>
            <label for="book_description">
                Опис книги:
                <input name="book_description" id="book_description" type="text" class="label-input">
            </label>
            <label for="book_img">
                Посилання на зображення:
                <input name="book_img" id="book_img" type="text" class="label-input">
            </label>
            <button class="submit-btn" type="submit">Створити книгу</button>
        </form>
    </div>
</section>