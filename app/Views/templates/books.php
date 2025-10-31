<section class="section-books">
    <header class="section-books-header">
        <h1 class="title">Nos livres à l’échange</h1>
        <form role="search">
            <label for="search-input" class="sr-only">Rechercher un livre</label>
            <input type="search" id="search" name="search" placeholder="Rechercher un livre" class="form-input">
        </form>
    </header>
    <div class="books-grid">
        <?php foreach ($books as $book): ?>
            <a href="index.php?action=book&id=<?= htmlspecialchars($book->getId()) ?>" class="book-card">
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