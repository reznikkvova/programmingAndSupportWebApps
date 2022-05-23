<section class="section section-registration">
    <div class="registration-form-wrapper">
        <?php

        $mysqli = new mysqli("localhost",
            "root", "Vovareznik2001",
            "library");

        if ($mysqli->connect_errno != 0) {
            die($mysqli->connect_error);
        }
        $id = (int)$_GET['id'];
        $query = 'SELECT * FROM books WHERE id="'.$id.'"';

        $book = mysqli_fetch_assoc($mysqli->query($query));

        if(!empty($_POST) ) {
            $_book_name = $_POST["book_name"];
            $_book_author = $_POST["book_author"];
            $_book_description = $_POST["book_description"];
            $_book_img = $_POST["book_img"];

            $update_query = "UPDATE books SET
                    book_name='".$_POST['book_name']."',
                    book_author='".$_POST['book_author']."',
                    book_description='".$_POST['book_description']."',
                    book_img='".$_POST['book_img']."'
                    WHERE id=$id ";

            if ($mysqli->query($update_query) === TRUE) {
                header("Location:http://localhost/library/index.php?action=books");
            } else {
                echo "Error: " . $update_query . "<br>" . $mysqli->error;
                header("Location:http://localhost/library/index.php?action=update_book&id=".$id);
            }

            $mysqli->close();
        } ?>
        <form action="index.php?action=update_book&id=<?php echo (int)$_GET['id'] ?>" method="post">
            <h3>Редагувати книгу</h3>
            <label for="book_name">
                Назва книги:
                <input name="book_name" id="book_name" type="text" class="label-input" value="<?php echo $book["book_name"] ?>">
            </label>
            <label for="book_author">
                Автор книги:
                <input name="book_author" id="book_author" type="text" class="label-input" value="<?php echo $book["book_author"] ?>">
            </label>
            <label for="book_description">
                Опис книги:
                <input name="book_description" id="book_description" type="text" class="label-input" value="<?php echo $book["book_description"] ?>">
            </label>
            <label for="book_img">
                Посилання на зображення:
                <input name="book_img" id="book_img" type="text" class="label-input" value="<?php echo $book["book_img"] ?>">
            </label>
            <button class="submit-btn" type="submit">Редагувати книгу</button>
        </form>
    </div>
</section>