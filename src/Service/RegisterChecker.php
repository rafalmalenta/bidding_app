<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class RegisterChecker
{
    private $em;
    private  $fb;
    public function __construct(FlashBagInterface $fb, EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->fb = $fb;
    }
    public function isPasswordLengthOk($password){
        if (strlen($password) <= 6) {
            $this->fb->add('error', "Password is too short");
            return false;
        }
        return true;
    }
    public function IsUserEmailFree($email)
    {
        $repository = $this->em->getRepository(User::class);
        if ($repository->findOneBy(['email' => $email]))
        {
            $this->fb->add('error', "User allready exist");
            return false;
        }
        return true;
    }
    public function doesPasswordsMatch($pas1,$pas2){
        if ($pas1 !== $pas2) {
            $this->fb->add('error', "Passwords arent same");
            return false;
        }
        return true;
    }

    public function checkIfCanRegister($request)
    {
        if (!$this->IsUserEmailFree($request->request->get('email')))
            return false;
        if (!$this->isPasswordLengthOk($request->request->get('password')))
            return false;
        if (!$this->doesPasswordsMatch($request->request->get('password'), $request->request->get('password2')))
            return false;
        return true;
    }
}