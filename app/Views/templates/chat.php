<section class="section-chat">
    <div class="section-chat-conversations">
        <h1 class="title">Messagerie</h1>
        <nav aria-label="Liste des conversations enregisrées">
            <ul>
                <?php 
                    $today = new DateTime('today');

                    foreach ($conversations as $conversation):
                        $activeChat = ($conversation['contact_id'] === $contactId);
                        $lastDate = new DateTime($conversation['last_date']);
                ?>
                    <li>
                        <a href="index.php?action=chat&id=<?= $conversation['contact_id'] ?>" class="chat-card<?= $activeChat ? ' active' : '' ?>">
                            <article>
                                <figure>
                                    <img src="images/users/<?= htmlspecialchars($conversation['user_avatar']) ?>" alt="Avatar de <?= htmlspecialchars($conversation['user_nickname']) ?>" class="img-cover">
                                </figure>
                                <h3 class="text-ellipsis"><?= htmlspecialchars($conversation['user_nickname']) ?></h3>
                                <time datetime="<?= $lastDate->format('c') ?>">
                                    <?= $lastDate >= $today ? $lastDate->format('H:i') : $lastDate->format('d.m') ?>
                                </time>
                                <p class="text-ellipsis"><?= htmlspecialchars($conversation['content']) ?></p>
                            </article>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <section class="section-chat-content">
        <button id="chat-back" aria-label="Retour à la liste des conversations" type="button" class="btn-js">
            &lt;- retour
        </button>
        <div class="chat-card">
            <figure>
                <img src="images/users/avatar13.webp" alt="Avatar de Alexlecture" class="img-cover">
            </figure>
            <h2>Alexlecture</h2>
        </div>
        <div class="section-chat-messages">
            <ul>
                <li>
                    <article class="chat-message sent" aria-label="Message envoyé">
                        <time datetime="2025-08-21T15:44">21.08 15:44</time>
                        <p>Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor</p>
                    </article>
                </li>
                <li>
                    <article class="chat-message received" aria-label="Message reçu">
                        <figure>
                            <img src="images/users/avatar13.webp" alt="Avatar de Alexlecture" class="img-cover">
                        </figure>
                        <time datetime="2025-08-21T15:48">21.08 15:48</time>
                        <p>Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor</p>
                    </article>
                </li>
            </ul>
        </div>
        <form>
            <label for="message" class="sr-only">Tapez votre message ici</label>
            <textarea id="message" name="message" rows="1" placeholder="Tapez votre message ici" class="form-input"></textarea>
            <input type="submit" id="send" value="Envoyer" class="cta cta-input">
        </form>
    </section>
</section>