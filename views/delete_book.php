<?php
    $id = (int)$_GET['id'];

    $mysqli = new mysqli("localhost",
        "root", "Vovareznik2001",
        "library");

    if ($mysqli->connect_errno != 0) {
        die($mysqli->connect_error);
    }

    $delete_query = "DELETE FROM books WHERE id=$id";

    if ($mysqli->query($delete_query) === TRUE) {
        header("Location:http://localhost/library/index.php?action=books");
    } else {
        echo "Error: " . $delete_query . "<br>" . $mysqli->error;
        header("Location:http://localhost/library/index.php?action=delete_book&id=".$id);
    }

    $mysqli->close();
?>