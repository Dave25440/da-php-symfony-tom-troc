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
    </head>
    <body>
        <header>
            <img src="images/tom-troc-logo.svg" alt="Logo Tom Troc">
            <nav>
                <ul class="nav-list">
                    <li>
                        <a href="#" class="nav-link-active">Accueil</a>
                    </li>
                    <li>
                        <a href="#">Nos livres à l'échange</a>
                    </li>
                </ul>
                <ul class="nav-list nav-list-user">
                    <li>
                        <img src="images/message-icon.svg" alt="Icône Messagerie" class="nav-icon">
                        <a href="#">Messagerie</a>
                        <span class="nav-message-counter" aria-label="1 message non lu">1</span>
                    </li>
                    <li>
                        <img src="images/account-icon.svg" alt="Icône Mon compte" class="nav-icon">
                        <a href="#">Mon compte</a>
                    </li>
                    <li>
                        <a href="#">Connexion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="section-join">
                <div class="section-join-content">
                    <h1 class="title">Rejoignez nos lecteurs passionnés</h1>
                    <p class="text-light">Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
                    <a href="#" class="cta">Découvrir</a>
                </div>
                <figure>
                    <img src="images/reading-hamza-nouasria.webp" alt="Homme en train de lire assis au milieu de piles de livres">
                    <figcaption>Hamza</figcaption>
                </figure>
            </section>
            <section class="section-books-preview">
                <h2 class="title">Les derniers livres ajoutés</h2>
                <div class="book-grid">
                    <a href="#" class="book-card">
                        <article>
                            <img src="images/esther-alabaster-small.webp" alt="">
                            <div class="book-info">
                                <h3>Esther</h3>
                                <h4>Alabaster</h4>
                                <p>Vendu par : CamilleClubLit</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <img src="images/kinfolk-table-williams-small.webp" alt="">
                            <div class="book-info">
                                <h3>The Kinfolk Table</h3>
                                <h4>Nathan Williams</h4>
                                <p>Vendu par : Nathalire</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <img src="images/wabi-sabi-kempton-small.webp" alt="">
                            <div class="book-info">
                                <h3>Wabi Sabi</h3>
                                <h4>Beth Kempton</h4>
                                <p>Vendu par : Alexlecture</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <img src="images/milk-honey-kaur-small.webp" alt="">
                            <div class="book-info">
                                <h3>Milk & honey</h3>
                                <h4>Rupi Kaur</h4>
                                <p>Vendu par : Hugo1990_12</p>
                            </div>
                        </article>
                    </a>
                </div>
                <a href="#" class="cta">Voir tous les livres</a>
            </section>
            <section></section>
            <section></section>
        </main>
        <footer>
            <ul class="footer-list">
                <li><a href="#" class="text-light">Politique de confidentialité</a></li>
                <li><a href="#" class="text-light">Mentions légales</a></li>
                <li class="text-light">Tom Troc©</li>
                <li><img src="images/tt-logo.svg" alt="Logo TT"></li>
            </ul>
        </footer>        
    </body>
</html>