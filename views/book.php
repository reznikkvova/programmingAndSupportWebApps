<section class="section">
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

        ?>
        <div class="card-book">
            <div class="card-book_img">
                <img alt="book image" src="<?php echo $book["book_img"] ?>"/>
            </div>
            <div class="card-book_content">
                <h3><?php echo $book["book_name"] ?></h3>
                <h5><?php echo $book["book_author"] ?></h5>
                <p><?php echo $book["book_description"] ?></p>
            </div>
            <?php if(isset($_SESSION) && isset($_SESSION['auth']) && $_SESSION['admin'] == 1) : ?>
                <a class="btn edit" href="index.php?action=update_book&id=<?php echo $book["id"] ?>">
                    <svg fill="#000000"  viewBox="0 0 24 24" width="24px" height="24px">   <path d="M 18.414062 2 C 18.158062 2 17.902031 2.0979687 17.707031 2.2929688 L 15.707031 4.2929688 L 14.292969 5.7070312 L 3 17 L 3 21 L 7 21 L 21.707031 6.2929688 C 22.098031 5.9019687 22.098031 5.2689063 21.707031 4.8789062 L 19.121094 2.2929688 C 18.926094 2.0979687 18.670063 2 18.414062 2 z M 18.414062 4.4140625 L 19.585938 5.5859375 L 18.292969 6.8789062 L 17.121094 5.7070312 L 18.414062 4.4140625 z M 15.707031 7.1210938 L 16.878906 8.2929688 L 6.171875 19 L 5 19 L 5 17.828125 L 15.707031 7.1210938 z"/></svg></a>
                <a class="btn delete" href="index.php?action=delete_book&id=<?php echo $book["id"] ?>">
                    <svg fill="#000000"  viewBox="0 0 24 24" width="24px" height="24px"><path d="M 10.806641 2 C 10.289641 2 9.7956875 2.2043125 9.4296875 2.5703125 L 9 3 L 4 3 A 1.0001 1.0001 0 1 0 4 5 L 20 5 A 1.0001 1.0001 0 1 0 20 3 L 15 3 L 14.570312 2.5703125 C 14.205312 2.2043125 13.710359 2 13.193359 2 L 10.806641 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z"/></svg>
                </a>
            <?php endif; ?>
        </div>
</section>