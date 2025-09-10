<?php
declare(strict_types=1);

namespace Codex\Controllers;

use Codex\Core\Controller;
use Codex\Models\User;

final class AdminController extends Controller
{
    public function index(): void
    {
        $this->requireRole('admin');
        $this->view('admin/index', [
            'title' => 'Panel Admin',
            'users' => User::all()
        ]);
    }
}
