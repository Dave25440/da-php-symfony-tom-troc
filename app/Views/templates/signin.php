<section class="section-auth">
    <div class="section-auth-wrapper">
        <h1 class="title">Connexion</h1>
        <?php if (!empty($register)): ?>
            <p role="alert" class="text-success"><?= htmlspecialchars($register) ?></p>
        <?php elseif (!empty($error)): ?>
            <p role="alert" class="text-error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action="index.php?action=login" method="post" aria-label="Formulaire de connexion">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" id="email" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" class="form-input" required>
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-input" required>
            <input type="submit" id="login" value="Se connecter" class="cta cta-input">
        </form>
        <p class="section-auth-text">
            Pas de compte ?
            <a href="index.php?action=signup">Inscrivez-vous</a>
        </p>
    </div>
    <figure>
        <img src="images/library-marialaura-gionfriddo.webp" alt="Étagères d'une bibliothèque remplies de piles de livres" class="img-cover">
    </figure>
</section>