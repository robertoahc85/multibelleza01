<?php
declare(strict_types=1);

namespace Codex\Models;

final class User
{
    public static function findByEmail(string $email): ?array
    {
        global $conn;
        $stmt = $conn->prepare("SELECT id,name,email,password_hash,role FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public static function create(string $name, string $email, string $password, string $role = 'user'): int
    {
        global $conn;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users(name,email,password_hash,role) VALUES (?,?,?,?)");
        $stmt->execute([$name, $email, $hash, $role]);
        return (int)$conn->lastInsertId();
    }

    public static function all(): array
    {
        global $conn;
        $stmt = $conn->query("SELECT id,name,email,role,created_at FROM users ORDER BY id DESC");
        return $stmt->fetchAll();
    }
}
