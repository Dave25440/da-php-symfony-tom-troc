<?php

namespace App\Views;

class View
{
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function render(string $template): void
    {
        $viewPath = __DIR__ . '/templates/' . $template . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("Vue '$template' introuvable.");
        }

        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        require __DIR__ . '/templates/main.php';
    }
}
