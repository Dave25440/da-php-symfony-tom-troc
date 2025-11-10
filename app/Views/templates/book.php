<nav class="breadcrumb-nav">
    <ol class="text-light">
        <li>
            <a href="index.php?action=books">Nos livres</a>
        </li>
        <li>
            <a href="index.php?action=book&id=<?= (int) $book->getId() ?>">
                <?= htmlspecialchars($book->getTitle()) ?>
            </a>
        </li>
    </ol>
</nav>
<article class="article-book">
    <figure>
        <img src="images/books/<?= htmlspecialchars($book->getCoverImage() ?? 'book-default.webp') ?>" alt="" class="img-cover article-book-cover">
    </figure>
    <div class="article-book-content">
        <h1 class="title">
            <?= htmlspecialchars($book->getTitle()) ?>
        </h1>
        <h2>
            <?= htmlspecialchars($book->getAuthor()) ?>
        </h2>
        <hr>
        <h3 class="title-uppercase">Description</h3>
        <div class="article-book-text">
            <?php
                $description = $book->getDescription() ?? 'Aucune description fournie.';
                $paragraphs = preg_split('/\R{2,}/', htmlspecialchars($description));

                foreach ($paragraphs as $p) {
                    echo '<p>' . nl2br(trim($p)) . '</p>';
                }
            ?>
        </div>
        <h3 class="title-uppercase">Propriétaire</h3>
        <a href="index.php?action=account&id=<?= (int) $user->getId() ?>" class="user-card">
            <figure>
                <img src="images/users/<?= htmlspecialchars($user->getAvatar() ?? 'avatar-default.webp') ?>" alt="" class="img-cover">
            </figure>
            <?= htmlspecialchars($user->getNickname()) ?>
        </a>
        <a href="index.php?action=chat" class="cta">Envoyer un message</a>
    </div>
</article>