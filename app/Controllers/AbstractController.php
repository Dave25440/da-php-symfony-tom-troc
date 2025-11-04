<?php

namespace App\Controllers;

use App\Models\Managers\UserManager;

abstract class AbstractController
{
    protected function checkAuth(): void
    {
        if (!isset($_SESSION['userId']) || $_SESSION['userId'] <= 0) {
            header('Location: index.php?action=signin');
            exit;
        }

        $userManager = new UserManager();
        $user = $userManager->findById($_SESSION['userId']);

        if ($user === null) {
            unset($_SESSION['userId']);
            header('Location: index.php?action=signin');
            exit;
        }
    }
}
