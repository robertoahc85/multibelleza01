<?php
declare(strict_types=1);

namespace Codex\Controllers;

use Codex\Core\Controller;

final class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home/index', [
            'title'   => 'Codex MVC',
            'message' => 'Bienvenido a Codex con PHP 8 + MVC 🚀'
        ]);
    }
}
