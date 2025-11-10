<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Managers\UserManager;

abstract class AbstractController
{
    protected ?User $user = null;

    protected function checkAuth(): void
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] <= 0) {
            header('Location: index.php?action=signin');
            exit;
        }

        $userManager = new UserManager();
        $this->user = $userManager->findById($_SESSION['user_id']);

        if ($this->user === null) {
            unset($_SESSION['user_id']);
            header('Location: index.php?action=signin');
            exit;
        }
    }

    protected function validateImage(array $file, array $extraTypes = []): ?string
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {

            // Renvoie un message selon le code d'erreur PHP
            return match ($file['error']) {
                UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'Fichier trop volumineux.',
                UPLOAD_ERR_NO_FILE => 'Aucun fichier envoyé.',
                default => "Erreur lors de l'envoi du fichier."
            };
        }

        $types = ['image/jpeg', 'image/png', 'image/webp'];
        $types = array_unique(array_merge($types, $extraTypes));

        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return 'Fichier temporaire invalide.';
        }

        $fileType = mime_content_type($file['tmp_name']);

        if (!in_array($fileType, $types, true)) {

            // Transforme les types MIME en extensions majuscules
            $extensions = array_map(function($mime) {
                $parts = explode('/', $mime);

                return strtoupper($parts[1] ?? $mime);
            }, $types);

            return "Les formats d'image autorisés sont " . implode(', ', $extensions) . '.';
        }

        if ($file['size'] > 2 * 1024 * 1024) {
            return "La taille de l'image ne doit pas dépasser 2 Mo.";
        }

        return null;
    }
}
