<section class="section-account">
    <h1 class="title">Mon compte</h1>
    <section class="section-account-profile">
        <figure>
            <img src="images/users/<?= htmlspecialchars($user->getAvatar() ?? 'user-default.webp') ?>" alt="" class="img-cover">
        </figure>
        <a href="#" aria-label="Modifier la photo de profil" class="profile-update">modifier</a>
        <hr>
        <h2 class="title"><?= htmlspecialchars($user->getNickname()) ?></h2>
        <p class="profile-membership">Membre depuis <?= htmlspecialchars($memberSince) ?></p>
        <h3 class="title-uppercase">Bibliothèque</h3>
        <p class="profile-books">
            <img src="icons/books-icon.svg" alt="" aria-hidden="true">
            <?= (int) $booksCount ?>
            <?= $booksCount > 1 ? 'livres' : 'livre' ?>
        </p>
    </section>
    <section class="section-account-details">
        <h2>Vos informations personnelles</h2>
        <form>
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" class="form-input form-input-update" required>
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-input form-input-update" required>
            <label for="username" class="form-label">Pseudo</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($user->getNickname()) ?>" class="form-input form-input-update" required>
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
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td>
                            <img src="images/books/<?= htmlspecialchars($book->getCoverImage() ?? 'book-default.webp') ?>" alt="" class="img-cover">
                        </td>
                        <th scope="row" class="text-ellipsis account-books-title"><?= htmlspecialchars($book->getTitle()) ?></th>
                        <td class="text-ellipsis account-books-author"><?= htmlspecialchars($book->getAuthor()) ?></td>
                        <td>
                            <p class="account-books-desc">
                                <?= htmlspecialchars($book->getDescription() ?? 'Aucune description fournie.') ?>
                            </p>
                        </td>
                        <td>
                            <p class="tag<?= $book->isExchangeable() ? '' : ' tag-unavailable' ?>">
                                <?= $book->isExchangeable() ? 'disponible' : 'non dispo.' ?>
                            </p>
                        </td>
                        <td>
                            <a href="index.php?action=editBook&id=<?= (int) $book->getId() ?>" aria-label="Éditer <?= htmlspecialchars($book->getTitle()) ?>">Éditer</a>
                        </td>
                        <td>
                            <a href="index.php?action=deleteBook&id=<?= (int) $book->getId() ?>" aria-label="Supprimer <?= htmlspecialchars($book->getTitle()) ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</section>