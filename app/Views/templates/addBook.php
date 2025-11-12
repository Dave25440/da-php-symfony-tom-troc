<section class="section-edit">
    <a href="index.php?action=editAccount">&lt;- retour</a>
    <h1 class="title">Ajouter un livre</h1>
    <form>
        <div class="section-edit-photo">
            <figure>
                <figcaption class="form-label">Photo</figcaption>
                <img src="images/books/book-default.webp" alt="" class="img-cover">
            </figure>
            <label for="cover-image" tabindex="0" id="cover-update">Modifier la photo</label>
            <input type="file" id="cover-image" name="cover_image" accept="image/jpeg, image/png, image/webp">
        </div>
        <div class="section-edit-info">
            <label for="title" class="form-label">Titre</label>
            <input type="text" id="title" name="title" class="form-input form-input-update" required>
            <label for="author" class="form-label">Auteur</label>
            <input type="text" id="author" name="author" class="form-input form-input-update" required>
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" rows="19" class="form-input form-input-update"></textarea>
            <label for="available" class="form-label">Disponibilité</label>
            <select id="available" name="available" class="form-input form-input-update">
                <option value="1">disponible</option>
                <option value="0">non dispo.</option>
            </select>
            <input type="submit" id="validate" value="Valider" class="cta cta-input">
        </div>
    </form>
</section>