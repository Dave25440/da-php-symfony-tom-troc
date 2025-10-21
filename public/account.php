<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon compte - Tom Troc</title>
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
                        <img src="icons/message-icon.svg" alt="Icône Messagerie" class="nav-icon">
                        <a href="message.php">Messagerie</a>
                        <span class="nav-counter" aria-live="polite">
                            1
                            <span class="sr-only"> message(s) non lu(s)</span>
                        </span>
                    </li>
                    <li class="nav-item-right">
                        <img src="icons/account-icon.svg" alt="Icône Mon compte" class="nav-icon">
                        <a href="account.php" class="active">Mon compte</a>
                    </li>
                    <li class="nav-item-right">
                        <a href="signin.php">Connexion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="section-account">
                <h1 class="title">Mon compte</h1>
                <section class="section-account-profile">
                    <figure>
                        <img src="images/user-nathalire.webp" alt="" class="img-cover">
                    </figure>
                    <a href="#" aria-label="Modifier la photo de profil">modifier</a>
                    <hr>
                    <h2 class="title">nathalire</h2>
                    <p class="profile-membership">Membre depuis 1 an</p>
                    <h3 class="title-uppercase">Bibliothèque</h3>
                    <p class="profile-books">
                        <img src="icons/books-icon.svg" alt="" aria-hidden="true">
                        4 livres
                    </p>
                </section>
                <section class="section-account-details">
                    <h2>Vos informations personnelles</h2>
                    <form>
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" id="email" name="email" value="nathalie@mail.com" class="form-input form-input-update">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" name="password" value="nathalire" class="form-input form-input-update">
                        <label for="username" class="form-label">Pseudo</label>
                        <input type="text" id="username" name="username" value="nathalire" class="form-input form-input-update">
                        <input type="submit" id="save" value="Enregistrer" class="cta cta-input cta-reverse">
                    </form>
                </section>
                <section class="section-account-books"></section>
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