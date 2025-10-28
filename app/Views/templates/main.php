<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($title) ?> - Tom Troc</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        <script src="js/script.js" defer></script>
    </head>
    <body>
        <header class="page-header">
            <div class="header-brand">
                <a href="index.php" aria-label="Accueil">
                    <img src="images/tom-troc-logo.svg" alt="Logo Tom Troc" class="header-logo">
                </a>
                <button id="menu-toggle" aria-label="Afficher le menu" type="button" class="btn-js">
                    <img src="icons/menu-icon.svg" alt="">
                </button>
            </div>
            <nav class="main-nav">
                <ul>
                    <li class="nav-item-left">
                        <a href="index.php" <?= $activeMenu === 'home' ? 'class="active"' : '' ?>>Accueil</a>
                    </li>
                    <li class="nav-item-left">
                        <a href="index.php?action=books" <?= $activeMenu === 'books' ? 'class="active"' : '' ?>>Nos livres à l'échange</a>
                    </li>
                    <li class="nav-item-right nav-item-border">
                        <img src="icons/chat-icon.svg" alt="Icône Messagerie" class="nav-icon">
                        <a href="index.php?action=chat" <?= $activeMenu === 'chat' ? 'class="active"' : '' ?>>Messagerie</a>
                        <span class="nav-counter" aria-live="polite">
                            1
                            <span class="sr-only"> message(s) non lu(s)</span>
                        </span>
                    </li>
                    <li class="nav-item-right">
                        <img src="icons/account-icon.svg" alt="Icône Mon compte" class="nav-icon">
                        <a href="index.php?action=editAccount" <?= $activeMenu === 'account' ? 'class="active"' : '' ?>>Mon compte</a>
                    </li>
                    <li class="nav-item-right">
                        <a href="index.php?action=signin" <?= $activeMenu === 'signin' ? 'class="active"' : '' ?>>Connexion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <?= $content ?>
        </main>
        <footer class="page-footer text-light">
            <ul>
                <li><a href="#">Politique de confidentialité</a></li>
                <li><a href="#">Mentions légales</a></li>
                <li>Tom Troc©</li>
                <li><img src="images/tt-logo.svg" alt="Logo TT"></li>
            </ul>
        </footer>
    </body>
</html>