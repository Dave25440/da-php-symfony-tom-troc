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
                    <a href="#" aria-label="Modifier la photo de profil" class="profile-update">modifier</a>
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
                <section class="section-account-books">
                    <h2 class="sr-only">Vos livres</h2>
                    <table>
                        <caption class="sr-only">Liste des livres enregistrés</caption>
                        <thead class="title-uppercase">
                            <tr>
                                <th scope="col">Photo</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Auteur</th>
                                <th scope="col">Description</th>
                                <th scope="col">Disponibilité</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="images/kinfolk-table-williams.webp" alt="" class="img-cover">
                                </td>
                                <th scope="row" class="text-ellipsis account-books-title">The Kinfolk Table</th>
                                <td class="text-ellipsis account-books-author">Nathan Williams</td>
                                <td>
                                    <p class="account-books-desc">
                                        J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d'une simple collection de recettes ; il célèbre l'art de partager des moments authentiques autour de la table.
                                        Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.
                                        Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers.
                                        'The Kinfolk Table' incarne parfaitement l'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.
                                    </p>
                                </td>
                                <td>
                                    <p class="tag">disponible</p>
                                </td>
                                <td>
                                    <a href="edit.php" aria-label="Éditer The Kinfolk Table">Éditer</a>
                                </td>
                                <td>
                                    <a href="#" aria-label="Supprimer The Kinfolk Table">Supprimer</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/kinfolk-table-williams.webp" alt="" class="img-cover">
                                </td>
                                <th scope="row" class="text-ellipsis account-books-title">The Kinfolk Table</th>
                                <td class="text-ellipsis account-books-author">Nathan Williams</td>
                                <td>
                                    <p class="account-books-desc">
                                        J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d'une simple collection de recettes ; il célèbre l'art de partager des moments authentiques autour de la table.
                                        Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.
                                        Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers.
                                        'The Kinfolk Table' incarne parfaitement l'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.
                                    </p>
                                </td>
                                <td>
                                    <p class="tag tag-unavailable">non dispo.</p>
                                </td>
                                <td>
                                    <a href="edit.php" aria-label="Éditer The Kinfolk Table">Éditer</a>
                                </td>
                                <td>
                                    <a href="#" aria-label="Supprimer The Kinfolk Table">Supprimer</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/kinfolk-table-williams.webp" alt="" class="img-cover">
                                </td>
                                <th scope="row" class="text-ellipsis account-books-title">The Kinfolk Table</th>
                                <td class="text-ellipsis account-books-author">Nathan Williams</td>
                                <td>
                                    <p class="account-books-desc">
                                        J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d'une simple collection de recettes ; il célèbre l'art de partager des moments authentiques autour de la table.
                                        Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.
                                        Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers.
                                        'The Kinfolk Table' incarne parfaitement l'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.
                                    </p>
                                </td>
                                <td>
                                    <p class="tag">disponible</p>
                                </td>
                                <td>
                                    <a href="edit.php" aria-label="Éditer The Kinfolk Table">Éditer</a>
                                </td>
                                <td>
                                    <a href="#" aria-label="Supprimer The Kinfolk Table">Supprimer</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/kinfolk-table-williams.webp" alt="" class="img-cover">
                                </td>
                                <th scope="row" class="text-ellipsis account-books-title">The Kinfolk Table</th>
                                <td class="text-ellipsis account-books-author">Nathan Williams</td>
                                <td>
                                    <p class="account-books-desc">
                                        J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d'une simple collection de recettes ; il célèbre l'art de partager des moments authentiques autour de la table.
                                        Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.
                                        Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers.
                                        'The Kinfolk Table' incarne parfaitement l'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.
                                    </p>
                                </td>
                                <td>
                                    <p class="tag tag-unavailable">non dispo.</p>
                                </td>
                                <td>
                                    <a href="edit.php" aria-label="Éditer The Kinfolk Table">Éditer</a>
                                </td>
                                <td>
                                    <a href="#" aria-label="Supprimer The Kinfolk Table">Supprimer</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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