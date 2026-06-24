<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\PermissionChecker;

class Question12 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasResponseInterface,
    \App\Contracts\HasInputInterface,
    \App\Contracts\HasExecuteInterface
{
    private PermissionChecker $checker;

    public function __construct(?PermissionChecker $checker = null)
    {
        $this->checker = $checker ?? new PermissionChecker();
    }

    public function title(): string
    {
        return 'Questão 12 - Sistema de Permissões';
    }

    public function description(): string
    {
        return 'Uma aplicação possui os seguintes perfis:

Administrador
Gerente
Operador
Cliente

Crie uma estrutura que permita verificar se um usuário possui acesso a determinada funcionalidade';
    }

    public function example(): string
    {
        return "Exemplo
canAccess('Administrador', 'delete_user'); // true
canAccess('Cliente', 'delete_user'); // false
Explique sua abordagem.";
    }

    public function response(): string
    {
        return "private const PERMISSIONS = [
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

    public function canAccess(string \$role, string \$permission): bool
    {
        return in_array(
            \$permission,
            self::PERMISSIONS[\$role] ?? [],
            true
        );
    }

Como usar:
canAccess('Administrador', 'delete_user'); // true
canAccess('Cliente', 'delete_user'); // false
canAccess('Gerente', 'view_reports'); // true
canAccess('Operador', 'create_user'); // false
";
    }

    public function input(): array
    {
        return [
            ['Administrador', 'delete_user'],
            ['Cliente', 'delete_user'],
            ['Gerente', 'view_reports'],
            ['Operador', 'create_user'],
        ];
    }

    public function execute(): array
    {
        $results = [];

        foreach ($this->input() as [$role, $permission]) {
            $results[] = [
                'role' => $role,
                'permission' => $permission,
                'has_access' => $this->checker->canAccess($role, $permission) ? 'true' : 'false',
            ];
        }

        return $results;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
