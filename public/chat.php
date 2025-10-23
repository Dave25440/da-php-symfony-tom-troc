<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messagerie - Tom Troc</title>
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
                        <a href="chat.php" class="active">Messagerie</a>
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
            <section class="section-chat">
                <div class="section-chat-conversations">
                    <h1 class="title">Messagerie</h1>
                    <nav aria-label="Liste des conversations enregisrées">
                        <ul>
                            <li>
                                <a href="#" class="chat-card active">
                                    <article>
                                        <figure>
                                            <img src="images/user-alexlecture.webp" alt="Avatar de Alexlecture" class="img-cover">
                                        </figure>
                                        <h3 class="text-ellipsis">Alexlecture</h3>
                                        <time datetime="2025-08-21T15:43">15:43</time>
                                        <p class="text-ellipsis">Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor</p>
                                    </article>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="chat-card">
                                    <article>
                                        <figure>
                                            <img src="images/user-nathalire.webp" alt="Avatar de Nathalire" class="img-cover">
                                        </figure>
                                        <h3 class="text-ellipsis">Nathalire</h3>
                                        <time datetime="2025-08-20">20.08</time>
                                        <p class="text-ellipsis">Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor</p>
                                    </article>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="chat-card">
                                    <article>
                                        <figure>
                                            <img src="images/user-sas634.webp" alt="Avatar de Sas634" class="img-cover">
                                        </figure>
                                        <h3 class="text-ellipsis">Sas634</h3>
                                        <time datetime="2025-08-15">15.08</time>
                                        <p class="text-ellipsis">Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor</p>
                                    </article>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <section class="section-chat-content">
                    <div class="chat-card">
                        <figure>
                            <img src="images/user-alexlecture.webp" alt="Avatar de Alexlecture" class="img-cover">
                        </figure>
                        <h2>Alexlecture</h2>
                    </div>
                    <div class="section-chat-messages">
                        <ul>
                            <li>
                                <article class="chat-message sent" aria-label="Message envoyé">
                                    <time datetime="2025-08-21T15:44">21.08 15:44</time>
                                    <p>Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor</p>
                                </article>
                            </li>
                            <li>
                                <article class="chat-message received" aria-label="Message reçu">
                                    <figure>
                                        <img src="images/user-alexlecture.webp" alt="Avatar de Alexlecture" class="img-cover">
                                    </figure>
                                    <time datetime="2025-08-21T15:48">21.08 15:48</time>
                                    <p>Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor</p>
                                </article>
                            </li>
                        </ul>
                    </div>
                    <form>
                        <label for="message" class="sr-only">Tapez votre message ici</label>
                        <textarea id="message" name="message" rows="1" placeholder="Tapez votre message ici" class="form-input"></textarea>
                        <input type="submit" id="send" value="Envoyer" class="cta cta-input">
                    </form>
                </section>
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