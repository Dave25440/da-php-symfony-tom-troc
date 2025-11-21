<?php 

namespace App\Controllers;

use App\Models\Managers\BookManager;

class PageController extends AbstractController
{
    public function home(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->findAll(4);

        $this->renderView('Accueil', ['books' => $books], 'home', 'home');
    }

    public function privacy(): void
    {
        $this->renderView('Politique de confidentialité', [], 'privacy', 'privacy');
    }

    public function legal(): void
    {
        $this->renderView('Mentions légales', [], 'legal', 'legal');
    }
}
