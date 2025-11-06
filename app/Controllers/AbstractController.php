<?php

namespace App\Controllers;

use App\Models\Managers\UserManager;

abstract class AbstractController
{
    protected function checkAuth(): void
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] <= 0) {
            header('Location: index.php?action=signin');
            exit;
        }

        $userManager = new UserManager();
        $user = $userManager->findById($_SESSION['user_id']);

        if ($user === null) {
            unset($_SESSION['user_id']);
            header('Location: index.php?action=signin');
            exit;
        }
    }
}
