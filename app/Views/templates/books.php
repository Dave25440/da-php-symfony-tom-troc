<section class="section-books">
    <header class="section-books-header">
        <h1 class="title">Nos livres à l’échange</h1>
        <form action="index.php" method="get" role="search">
            <input type="hidden" name="action" value="books">
            <label for="search" class="sr-only">Rechercher un livre</label> 
            <input type="search" id="search" name="search" placeholder="Rechercher un livre" value="<?= htmlspecialchars($search) ?>" class="form-input">
        </form>
    </header>
    <div class="books-grid">
        <?php foreach ($books as $book): ?>
            <a href="index.php?action=book&id=<?= (int) $book->getId() ?>" class="book-card">
                <article>
                    <figure>
                        <img src="images/books/<?= htmlspecialchars($book->getCoverImage()) ?>" alt="" class="img-cover">
                    </figure>
                    <div class="text-ellipsis book-info">
                        <h3><?= htmlspecialchars($book->getTitle()) ?></h3>
                        <h4><?= htmlspecialchars($book->getAuthor()) ?></h4>
                        <p class="text-caption">Vendu par : <?= htmlspecialchars($book->getUserNickname() ?? 'Inconnu') ?></p>
                    </div>
                </article>
            </a>
        <?php endforeach; ?>
    </div>
</section>