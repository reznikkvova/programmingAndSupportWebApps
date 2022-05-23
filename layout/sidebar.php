<aside class="sidebar">
    <ul class="sidebar-list">
        <li class="sidebar-item">
            <a href="index.php?action=books">Перегляд книг</a>
        </li>
        <?php if(isset($_SESSION) && isset($_SESSION['auth'])) : ?>
            <li class="sidebar-item">
                <a href="index.php?action=create_book">Додати книгу</a>
            </li>
        <?php endif; ?>
    </ul>
</aside>
