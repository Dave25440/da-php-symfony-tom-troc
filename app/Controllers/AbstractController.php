<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Managers\UserManager;
use App\Services\UserNotification;
use App\Views\View;

abstract class AbstractController
{
    protected UserNotification $userNotification;
    protected ?User $user = null;

    public function __construct()
    {
        $this->userNotification = new UserNotification();
    }

    protected function renderView(string $title, array $data = [], string $template, ?string $activeMenu = null): void
    {
        $data['unreadMessages'] = $this->userNotification->getUnreadMessages($_SESSION['user_id'] ?? null);

        $view = new View($title, $data);
        $view->render($template, $activeMenu);

        exit;
    }

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

    protected function redirectAuth(): void
    {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
            header('Location: index.php?action=editAccount');
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

    protected function processImage(string $file, int $width, int $height): \GdImage|false
    {
        $type = mime_content_type($file);

        // Charge l'image selon son type MIME
        $image = match ($type) {
            'image/gif' => imagecreatefromgif($file),
            'image/jpeg' => imagecreatefromjpeg($file),
            'image/png' => imagecreatefrompng($file),
            'image/webp' => imagecreatefromwebp($file),
            default => false
        };

        if ($image === false) {
            return false;
        }

        $w = imagesx($image);
        $h = imagesy($image);

        // Ajuste les dimensions pour couvrir la zone cible sans déformation
        $scale = max($width / $w, $height / $h);
        $scaleW = (int)($w * $scale);
        $scaleH = (int)($h * $scale);

        // Crée l'image redimensionnée avec gestion de la transparence
        $resized = imagecreatetruecolor($scaleW, $scaleH);
        imagesavealpha($resized, true);
        imagealphablending($resized, false);
        imagecopyresampled($resized, $image, 0, 0, 0, 0, $scaleW, $scaleH, $w, $h);

        // Crée l'image aux dimensions demandées avec un recadrage centré
        $final = imagecreatetruecolor($width, $height);
        imagesavealpha($final, true);
        imagealphablending($final, false);

        $cropX = (int)(($scaleW - $width) / 2);
        $cropY = (int)(($scaleH - $height) / 2);

        imagecopy($final, $resized, 0, 0, $cropX, $cropY, $width, $height);

        // Détruit les images intermédiaires
        imagedestroy($resized);
        imagedestroy($image);

        return $final;
    }
}
