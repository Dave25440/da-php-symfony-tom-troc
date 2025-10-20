<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Kinfolk Table - Tom Troc</title>
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
                        <a href="books.php" class="active">Nos livres à l'échange</a>
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
                        <a href="account.php">Mon compte</a>
                    </li>
                    <li class="nav-item-right">
                        <a href="signin.php">Connexion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <nav class="breadcrumb-nav">
                <ol class="text-light">
                    <li>
                        <a href="books.php">Nos livres</a>
                    </li>
                    <li>
                        <a href="book.php">The Kinfolk Table</a>
                    </li>
                </ol>
            </nav>
            <article class="article-book">
                <figure>
                    <img src="images/kinfolk-table-williams.webp" alt="" class="img-cover article-book-cover">
                </figure>
                <div class="article-book-content">
                    <h1 class="title">The Kinfolk Table</h1>
                    <h2>par Nathan Williams</h2>
                    <hr>
                    <h3 class="title-uppercase">Description</h3>
                    <div class="article-book-text">
                        <p>J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d'une simple collection de recettes ; il célèbre l'art de partager des moments authentiques autour de la table.</p>
                        <p>Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.</p>
                        <p>Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers.</p>
                        <p>'The Kinfolk Table' incarne parfaitement l'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.</p>
                    </div>
                    <h3 class="title-uppercase">Propriétaire</h3>
                    <a href="profile.php" class="user-card">
                        <figure>
                            <img src="images/user-nathalire.webp" alt="" class="img-cover">
                        </figure>
                        Nathalire
                    </a>
                    <a href="message.php" class="cta">Envoyer un message</a>
                </div>
            </article>
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