<section class="section-account section-account-public">
    <h1 class="sr-only">Profil de <?= htmlspecialchars($user->getNickname()) ?></h1>
    <section class="section-account-profile">
        <figure>
            <img src="images/users/<?= htmlspecialchars($user->getAvatar() ?? 'avatar-default.webp') ?>" alt="" class="img-cover">
        </figure>
        <hr>
        <h2 class="title"><?= htmlspecialchars($user->getNickname()) ?></h2>
        <p class="profile-membership">Membre depuis <?= htmlspecialchars($memberSince) ?></p>
        <h3 class="title-uppercase">Bibliothèque</h3>
        <p class="profile-books">
            <img src="icons/books-icon.svg" alt="" aria-hidden="true">
            <?= (int) $booksCount ?>
            <?= $booksCount > 1 ? 'livres' : 'livre' ?>
        </p>
        <a href="index.php?action=chat" class="cta cta-reverse">Écrire un message</a>
    </section>
    <section class="section-account-books">
        <h2 class="sr-only">Livres de <?= htmlspecialchars($user->getNickname()) ?></h2>
        <table>
            <caption class="sr-only">Liste des livres enregistrés</caption>
            <thead class="title-uppercase">
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Description</th>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</section>