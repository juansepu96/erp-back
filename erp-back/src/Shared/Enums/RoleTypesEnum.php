<?php

namespace Src\Shared\Enums;

enum RoleTypesEnum: int
{
    case ADMINISTRADOR = 1;
    case USUARIO = 2;
    case CONTADOR = 3;

    public static function name(int $id): string
    {
        return match ($id) {
            self::ADMINISTRADOR->value => 'ADMINISTRADOR',
            self::USUARIO->value => 'USUARIO',
            self::CONTADOR->value => 'CONTADOR',
            default => 'Desconocido',
        };
    }
}
