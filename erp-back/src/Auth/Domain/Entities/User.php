<?php

namespace Src\Auth\Domain\Entities;

use Src\Auth\Domain\ValueObjects\LastLogin;
use Src\Auth\Domain\ValueObjects\Lastname;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Role;
use Src\Auth\Domain\ValueObjects\Username;
use Src\Shared\ValueObjects\Active;
use Src\Shared\ValueObjects\Id;
use Src\Shared\ValueObjects\Name;

readonly class User
{
    private Id $idUser;
    private Id $idPerson;
    private Username $username;
    private Password $password;
    private LastLogin $lastLogin;
    private Active $active;
    private Name $name;
    private Lastname $lastname;
    private Role $role;

    public function __construct(
        Id        $idUser,
        Id        $idPerson,
        Username  $username,
        Password  $password,
        LastLogin $lastLogin,
        Active    $active,
        Name $name,
        Lastname $lastname,
        Role $role
    ) {
        $this->idUser = $idUser;
        $this->idPerson = $idPerson;
        $this->username = $username;
        $this->password = $password;
        $this->lastLogin = $lastLogin;
        $this->active = $active;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->role = $role;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getLastname(): Lastname
    {
        return $this->lastname;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function getIdUser(): Id
    {
        return $this->idUser;
    }
    public function getIdPersona(): Id
    {
        return $this->idPerson;
    }

    public function getUsername(): Username
    {
        return $this->username;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getLastLogin(): LastLogin
    {
        return $this->lastLogin;
    }

    public function getActive(): Active
    {
        return $this->active;
    }
}
