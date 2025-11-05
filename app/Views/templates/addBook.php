<section class="section-edit">
    <a href="index.php?action=editAccount">&lt;- retour</a>
    <h1 class="title">Ajouter un livre</h1>
    <div class="section-edit-wrapper">
        <figure>
            <figcaption class="form-label">Photo</figcaption>
            <img src="images/books/book-default.webp" alt="" class="img-cover">
            <a href="#">Modifier la photo</a>
        </figure>
        <form>
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
        </form>
    </div>
</section>