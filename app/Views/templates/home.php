<section class="section-join">
    <div class="section-join-content">
        <h1 class="title">Rejoignez nos lecteurs passionnés</h1>
        <p class="text-light">Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
        <a href="index.php?action=books" class="cta">Découvrir</a>
    </div>
    <figure>
        <img src="images/reading-hamza-nouasria.webp" alt="Homme en train de lire assis au milieu de piles de livres">
        <figcaption class="text-caption">Hamza</figcaption>
    </figure>
</section>
<section class="section-books-preview">
    <h2 class="title">Les derniers livres ajoutés</h2>
    <div class="books-grid">
        <?php foreach ($books as $book): ?>
            <a href="index.php?action=book&id=<?= htmlspecialchars($book->getId()) ?>" class="book-card">
                <article>
                    <figure>
                        <img src="<?= htmlspecialchars($book->getCoverImage()) ?>" alt="" class="img-cover">
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
    <a href="index.php?action=books" class="cta">Voir tous les livres</a>
</section>
<section class="section-how-it-works">
    <h2 class="title">Comment ça marche ?</h2>
    <p class="text-light">
        Échanger des livres avec TomTroc c’est simple et<br>
        amusant ! Suivez ces étapes pour commencer :
    </p>
    <ol>
        <li>Inscrivez-vous gratuitement sur notre plateforme.</li>
        <li>Ajoutez les livres que vous souhaitez échanger à votre profil.</li>
        <li>Parcourez les livres disponibles chez d'autres membres.</li>
        <li>Proposez un échange et discutez avec d'autres passionnés de lecture.</li>
    </ol>
    <a href="index.php?action=books" class="cta cta-reverse">Voir tous les livres</a>
</section>
<section class="section-values">
    <figure class="section-values-banner">
        <img src="images/banner-darwin-vegher.webp" alt="" aria-hidden="true" class="img-cover">
    </figure>
    <div class="section-values-content">
        <h2 class="title">Nos valeurs</h2>
        <div class="section-values-text text-light">
            <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
            <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
            <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
        </div>
        <footer class="section-values-footer">
            <p class="text-caption">L'équipe Tom Troc</p>
            <img src="images/tom-troc-signature.svg" alt="" aria-hidden="true">
        </footer>
    </div>
</section>