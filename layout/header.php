<header class="header">
    <div class="container">
        <div class="header-body">
            <div class="header-logo">
                <img src="https://cdn-icons-png.flaticon.com/512/23/23358.png?w=360" alt="">
                <h1>Бібліотека</h1>
            </div>

            <nav class="header-nav">
                <ul class="header-list">
                    <li class="header-list__item">
                        <a href="index.php?action=main">Головна</a>
                    </li>
                    <li class="header-list__item">
                        <a href="index.php?action=about">Про нас</a>
                    </li>
                    <?php if(isset($_SESSION) && isset($_SESSION['auth'])) : ?>
                        <li class="header-list__item">
                            <a href="index.php?action=logout">Вийти</a>
                        </li>
                    <?php else: ?>
                        <li class="header-list__item">
                            <a href="index.php?action=login">Увійти</a>
                        </li>
                        <li class="header-list__item">
                            <a href="index.php?action=registration">Реєстрація</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>