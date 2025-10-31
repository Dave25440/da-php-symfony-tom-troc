<section class="section-edit">
    <a href="index.php?action=editAccount">&lt;- retour</a>
    <h1 class="title">Modifier les informations</h1>
    <div class="section-edit-wrapper">
        <figure>
            <figcaption class="form-label">Photo</figcaption>
            <img src="images/books/kinfolk-table-williams.webp" alt="" class="img-cover">
            <a href="#">Modifier la photo</a>
        </figure>
        <form>
            <label for="title" class="form-label">Titre</label>
            <input type="text" id="title" name="title" value="The Kinfolk Table" class="form-input form-input-update">
            <label for="author" class="form-label">Auteur</label>
            <input type="text" id="author" name="author" value="Nathan Williams" class="form-input form-input-update">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" rows="19" class="form-input form-input-update">
J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d'une simple collection de recettes ; il célèbre l'art de partager des moments authentiques autour de la table.

Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.

Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers.

'The Kinfolk Table' incarne parfaitement l'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.
            </textarea>
            <label for="available" class="form-label">Disponibilité</label>
            <select id="available" name="available" class="form-input form-input-update">
                <option value="true">disponible</option>
                <option value="false">non dispo.</option>
            </select>
            <input type="submit" id="validate" value="Valider" class="cta cta-input">
        </form>
    </div>
</section>