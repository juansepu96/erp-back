<?php

namespace Src\Auth\Domain\Services;
use Src\Auth\Domain\Entities\User;
use Src\Shared\Facades\AuthUser;

class AuthService
{
    protected ?User $user = null;

    public function setUser(?User $user): void
    {
        $this->user = $user;
    }
    public function logout(): void
    {
        $this->setUser(null);
    }
    public function getUser(): ?User
    {
        return $this->user;
    }
    public function isLogged():bool
    {
        dd($this->user);
        return $this->user !== null;
    }

    public function Id():int
    {
        return $this->getUser()->getIdUser()->getValue();
    }

    public function IdPerson():int
    {
        return $this->getUser()->getIdPersona()->getValue();
    }

    public function Name():string
    {
        return $this->getUser()->getName()->getValue();
    }

    public function Lastname():string
    {
        return $this->getUser()->getLastName()->getValue();
    }
    public function Role():string
    {
        return $this->getUser()->getRole()->getValue()->name;
    }


}
