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
            <nav>
                <ul>
                    <li class="nav-item-left">
                        <a href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item-left">
                        <a href="books.php" class="active">Nos livres à l'échange</a>
                    </li>
                    <li class="nav-item-right nav-item-border">
                        <img src="icons/message-icon.svg" alt="Icône Messagerie" class="nav-icon">
                        <a href="#">Messagerie</a>
                        <span class="nav-counter" aria-live="polite">
                            1
                            <span class="sr-only"> message(s) non lu(s)</span>
                        </span>
                    </li>
                    <li class="nav-item-right">
                        <img src="icons/account-icon.svg" alt="Icône Mon compte" class="nav-icon">
                        <a href="#">Mon compte</a>
                    </li>
                    <li class="nav-item-right">
                        <a href="#">Connexion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="section-books">
                <header class="section-books-header">
                    <h1 class="title">Nos livres à l’échange</h1>
                    <form role="search">
                        <img src="icons/search-icon.svg" alt="" aria-hidden=true>
                        <label for="search-input" class="sr-only">Rechercher un livre</label>
                        <input type="search" id="search-input" placeholder="Rechercher un livre">
                    </form>
                </header>
                <div class="books-grid">
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/esther-alabaster.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Esther</h3>
                                <h4>Alabaster</h4>
                                <p class="text-caption">Vendu par : CamilleClubLit</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/kinfolk-table-williams.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>The Kinfolk Table</h3>
                                <h4>Nathan Williams</h4>
                                <p class="text-caption">Vendu par : Nathalire</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/wabi-sabi-kempton.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Wabi Sabi</h3>
                                <h4>Beth Kempton</h4>
                                <p class="text-caption">Vendu par : Alexlecture</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/milk-honey-kaur.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Milk & honey</h3>
                                <h4>Rupi Kaur</h4>
                                <p class="text-caption">Vendu par : Hugo1990_12</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/delight-rossow.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Delight!</h3>
                                <h4>Justin Rossow</h4>
                                <p class="text-caption">Vendu par : Juju1432</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/milwaukee-mission-low.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Milwaukee Mission</h3>
                                <h4>Elder Cooper Low</h4>
                                <p class="text-caption">Vendu par : Christiane75014</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/minimalist-graphics-schonlau.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Minimalist Graphics</h3>
                                <h4>Julia Schonlau</h4>
                                <p class="text-caption">Vendu par : Hamzalecture</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/hygge-wiking.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Hygge</h3>
                                <h4>Meik Wiking</h4>
                                <p class="text-caption">Vendu par : Hugo1990_12</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/innovation-ridley.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Innovation</h3>
                                <h4>Matt Ridley</h4>
                                <p class="text-caption">Vendu par : Lou&Ben50</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/psalms-alabaster.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Psalms</h3>
                                <h4>Alabaster</h4>
                                <p class="text-caption">Vendu par : Lolobzh</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/thinking-fast-kahneman.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Thinking, Fast & Slow</h3>
                                <h4>Daniel Kahneman</h4>
                                <p class="text-caption">Vendu par : Sas634</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/book-hope-kaur.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>A Book Full of Hope</h3>
                                <h4>Rupi Kaur</h4>
                                <p class="text-caption">Vendu par : ML95</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/subtle-art-manson.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>The Subtle Art of Not Giving a F*ck</h3>
                                <h4>Mark Manson</h4>
                                <p class="text-caption">Vendu par : Verogo33</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/narnia-lewis.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Narnia</h3>
                                <h4>C.S. Lewis</h4>
                                <p class="text-caption">Vendu par : AnnikaBrahms</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/company-one-jarvis.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>Company of One</h3>
                                <h4>Paul Jarvis</h4>
                                <p class="text-caption">Vendu par : Victoirefabr912</p>
                            </div>
                        </article>
                    </a>
                    <a href="#" class="book-card">
                        <article>
                            <figure>
                                <img src="images/two-towers-tolkien.webp" alt="">
                            </figure>
                            <div class="book-info">
                                <h3>The Two Towers</h3>
                                <h4>J.R.R. Tolkien</h4>
                                <p class="text-caption">Vendu par : Lotrfanclub67</p>
                            </div>
                        </article>
                    </a>
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