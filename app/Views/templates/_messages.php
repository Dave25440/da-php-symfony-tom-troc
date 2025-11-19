<?php foreach ($messages as $message):
    $sent = ($message->getAuthorId() === $userId);
    $date = $message->getCreatedAt();
?>
    <li>
        <article class="chat-message <?= $sent ? 'sent' : 'received' ?>" aria-label="Message <?= $sent ? 'envoyé' : 'reçu' ?>">
            <?php if (!$sent): ?>
                <figure>
                    <img src="images/users/<?= htmlspecialchars($activeContact['user_avatar'] ?? 'avatar-default.webp') ?>" alt="Avatar de <?= htmlspecialchars($activeContact['user_nickname']) ?>" class="img-cover">
                </figure>
            <?php endif; ?>
            <time datetime="<?= $date->format('c') ?>"><?= $date->format('d.m H:i') ?></time>
            <p><?= htmlspecialchars($message->getContent()) ?></p>
        </article>
    </li>
<?php endforeach; ?>