<section class="section-edit">
    <a href="index.php?action=editAccount&id=<?= (int) $book->getUserId() ?>">&lt;- retour</a>
    <h1 class="title">Modifier les informations</h1>
    <div class="section-edit-wrapper">
        <figure>
            <figcaption class="form-label">Photo</figcaption>
            <img src="images/books/<?= htmlspecialchars($book->getCoverImage()) ?>" alt="" class="img-cover">
            <a href="#">Modifier la photo</a>
        </figure>
        <form>
            <label for="title" class="form-label">Titre</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($book->getTitle()) ?>" class="form-input form-input-update">
            <label for="author" class="form-label">Auteur</label>
            <input type="text" id="author" name="author" value="<?= htmlspecialchars($book->getAuthor()) ?>" class="form-input form-input-update">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" rows="19" class="form-input form-input-update"><?=
                htmlspecialchars($book->getDescription() ?? 'Aucune description fournie.')
            ?></textarea>
            <label for="available" class="form-label">Disponibilité</label>
            <select id="available" name="available" class="form-input form-input-update">
                <option value="1" <?= ((int) $book->isExchangeable() === 1) ? 'selected' : '' ?>>disponible</option>
                <option value="0" <?= ((int) $book->isExchangeable() === 0) ? 'selected' : '' ?>>non dispo.</option>
            </select>
            <input type="submit" id="validate" value="Valider" class="cta cta-input">
        </form>
    </div>
</section>