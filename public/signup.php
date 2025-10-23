<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription - Tom Troc</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        <script src="js/menu-toggle.js" defer></script>
    </head>
    <body>
        <header class="page-header">
            <div class="header-brand">
                <img src="images/tom-troc-logo.svg" alt="Logo Tom Troc">
                <button id="menu-toggle" aria-label="Afficher le menu" type="button">
                    <img src="icons/menu-icon.svg" alt="">
                </button>
            </div>
            <nav class="main-nav">
                <ul>
                    <li class="nav-item-left">
                        <a href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item-left">
                        <a href="books.php">Nos livres à l'échange</a>
                    </li>
                    <li class="nav-item-right nav-item-border">
                        <img src="icons/chat-icon.svg" alt="Icône Messagerie" class="nav-icon">
                        <a href="chat.php">Messagerie</a>
                        <span class="nav-counter" aria-live="polite">
                            1
                            <span class="sr-only"> message(s) non lu(s)</span>
                        </span>
                    </li>
                    <li class="nav-item-right">
                        <img src="icons/account-icon.svg" alt="Icône Mon compte" class="nav-icon">
                        <a href="account.php">Mon compte</a>
                    </li>
                    <li class="nav-item-right">
                        <a href="signin.php" class="active">Connexion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="section-auth">
                <div class="section-auth-wrapper">
                    <h1 class="title">Inscription</h1>
                    <form aria-label="Formulaire d'inscription">
                        <label for="username" class="form-label">Pseudo</label>
                        <input type="text" id="username" name="username" class="form-input">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" id="email" name="email" class="form-input">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-input">
                        <input type="submit" id="signup" value="S'inscrire" class="cta cta-input">
                    </form>
                    <p>
                        Déjà inscrit(e) ?
                        <a href="signin.php">Connectez-vous</a>
                    </p>
                </div>
                <figure>
                    <img src="images/library-marialaura-gionfriddo.webp" alt="Étagères d'une bibliothèque remplies de piles de livres" class="img-cover">
                </figure>
            </section>
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