<section class="section-auth">
    <div class="section-auth-wrapper">
        <h1 class="title">Inscription</h1>
        <?php if (!empty($error)): ?>
            <p role="alert" class="text-error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action="index.php?action=register" method="post" aria-label="Formulaire d'inscription">
            <label for="nickname" class="form-label">Pseudo</label>
            <input type="text" id="nickname" name="nickname" value="<?= isset($nickname) ? htmlspecialchars($nickname) : '' ?>" class="form-input" required>
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" id="email" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" class="form-input" required>
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-input" required>
            <input type="submit" id="register" value="S'inscrire" class="cta cta-input">
        </form>
        <p class="section-auth-text">
            Déjà inscrit(e) ?
            <a href="index.php?action=signin">Connectez-vous</a>
        </p>
    </div>
    <figure>
        <img src="images/library-marialaura-gionfriddo.webp" alt="Étagères d'une bibliothèque remplies de piles de livres" class="img-cover">
    </figure>
</section>