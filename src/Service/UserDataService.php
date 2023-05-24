<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Bundle\SecurityBundle\Security;

class UserDataService
{
    public function __construct(
        private readonly Security $security=new Security(),
    ){}
    public function getCurrentUser() : User
    {
        return $this->security->getUser()();
    }
}