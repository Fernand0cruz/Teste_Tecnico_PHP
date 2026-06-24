<?php

declare(strict_types=1);

namespace App\Services;

final class PermissionChecker
{
    private const PERMISSIONS = [
        'Administrador' => [
            'create_user',
            'edit_user',
            'delete_user',
            'view_reports',
        ],
        'Gerente' => [
            'create_user',
            'edit_user',
            'view_reports',
        ],
        'Operador' => [
            'view_reports',
        ],
        'Cliente' => [
            'view_profile',
        ],
    ];

    public function canAccess(string $role, string $permission): bool
    {
        return in_array($permission, self::PERMISSIONS[$role] ?? [], true);
    }
}
