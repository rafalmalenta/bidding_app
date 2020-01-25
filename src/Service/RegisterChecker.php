<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
class RegisterChecker
{
    private $em;
    private $error="";
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function checkIfCanRegister($request)
    {
        $repository = $this->em->getRepository(User::class);
        if ($request->isMethod('POST')) {
            if ($repository->findOneBy(['email' => $request->request->get('email')])) {
                $this->error = "User already exist";
            }
            else if ($request->request->get('password') !== $request->request->get('password2'))
                $this->error = "Passwords doesnt match";
            else {
                return true;
            }
        }
    }
    public function getError(){
        return $this->error;
    }
}