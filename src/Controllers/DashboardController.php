<?php
declare(strict_types=1);

namespace Codex\Controllers;

use Codex\Core\Controller;

final class DashboardController extends Controller
{
    public function index(): void
    {
        $this->requireAuth();
        $this->view('dashboard/index', ['title'=>'Dashboard','user'=>$_SESSION['user'] ?? null]);
    }
}
