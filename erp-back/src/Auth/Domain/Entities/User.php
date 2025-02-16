<?php

namespace Src\Auth\Domain\Entities;

use Src\Auth\Domain\ValueObjects\LastLogin;
use Src\Auth\Domain\ValueObjects\Password;
use Src\Auth\Domain\ValueObjects\Username;
use Src\Shared\ValueObjects\Active;
use Src\Shared\ValueObjects\IdPersona;

readonly class User
{
    private IdPersona $idPersona;
    private Username $username;
    private Password $password;
    private LastLogin $lastLogin;
    private Active $active;

    public function __construct(
        IdPersona $idPersona,
        Username $username,
        Password $password,
        LastLogin $lastLogin,
        Active $active
    ) {
        $this->idPersona = $idPersona;
        $this->username = $username;
        $this->password = $password;
        $this->lastLogin = $lastLogin;
        $this->active = $active;
    }

    public function getIdPersona(): IdPersona
    {
        return $this->idPersona;
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
