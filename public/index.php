<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil - Tom Troc</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        <script src="js/script.js" defer></script>
    </head>
    <body>
        <header class="page-header">
            <div class="header-brand">
                <img src="images/tom-troc-logo.svg" alt="Logo Tom Troc">
                <button id="menu-toggle" aria-label="Afficher le menu" type="button" class="btn-js">
                    <img src="icons/menu-icon.svg" alt="">
                </button>
            </div>
            <nav class="main-nav">
                <ul>
                    <li class="nav-item-left">
                        <a href="index.php" class="active">Accueil</a>
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
                        <a href="signin.php">Connexion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="section-join">
                <div class="section-join-content">
                    <h1 class="title">Rejoignez nos lecteurs passionnés</h1>
                    <p class="text-light">Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
                    <a href="books.php" class="cta">Découvrir</a>
                </div>
                <figure>
                    <img src="images/reading-hamza-nouasria.webp" alt="Homme en train de lire assis au milieu de piles de livres">
                    <figcaption class="text-caption">Hamza</figcaption>
                </figure>
            </section>
            <section class="section-books-preview">
                <h2 class="title">Les derniers livres ajoutés</h2>
                <div class="books-grid">
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/esther-alabaster.webp" alt="" class="img-cover">
                            </figure>
                            <div class="text-ellipsis book-info">
                                <h3>Esther</h3>
                                <h4>Alabaster</h4>
                                <p class="text-caption">Vendu par : CamilleClubLit</p>
                            </div>
                        </article>
                    </a>
                    <a href="book.php" class="book-card">
                        <article>
                            <figure>
                                <img src="images/kinfolk-table-williams.webp" alt="" class="img-cover">
                            </figure>
                            <div class="text-ellipsis book-info">
                                <h3>The Kinfolk Table</h3>
                                <h4>Nathan Williams</h4>
                                <p class="text-caption">Vendu par : Nathalire</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/wabi-sabi-kempton.webp" alt="" class="img-cover">
                            </figure>
                            <div class="text-ellipsis book-info">
                                <h3>Wabi Sabi</h3>
                                <h4>Beth Kempton</h4>
                                <p class="text-caption">Vendu par : Alexlecture</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/milk-honey-kaur.webp" alt="" class="img-cover">
                            </figure>
                            <div class="text-ellipsis book-info">
                                <h3>Milk & honey</h3>
                                <h4>Rupi Kaur</h4>
                                <p class="text-caption">Vendu par : Hugo1990_12</p>
                            </div>
                        </article>
                    </a>
                </div>
                <a href="books.php" class="cta">Voir tous les livres</a>
            </section>
            <section class="section-how-it-works">
                <h2 class="title">Comment ça marche ?</h2>
                <p class="text-light">
                    Échanger des livres avec TomTroc c’est simple et<br>
                    amusant ! Suivez ces étapes pour commencer :
                </p>
                <ol>
                    <li>Inscrivez-vous gratuitement sur notre plateforme.</li>
                    <li>Ajoutez les livres que vous souhaitez échanger à votre profil.</li>
                    <li>Parcourez les livres disponibles chez d'autres membres.</li>
                    <li>Proposez un échange et discutez avec d'autres passionnés de lecture.</li>
                </ol>
                <a href="books.php" class="cta cta-reverse">Voir tous les livres</a>
            </section>
            <section class="section-values">
                <figure class="section-values-banner">
                    <img src="images/banner-darwin-vegher.webp" alt="" aria-hidden="true" class="img-cover">
                </figure>
                <div class="section-values-content">
                    <h2 class="title">Nos valeurs</h2>
                    <div class="section-values-text text-light">
                        <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
                        <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
                        <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
                    </div>
                    <footer class="section-values-footer">
                        <p class="text-caption">L'équipe Tom Troc</p>
                        <img src="images/tom-troc-signature.svg" alt="" aria-hidden="true">
                    </footer>
                </div>
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