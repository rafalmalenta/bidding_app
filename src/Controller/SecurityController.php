<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();        
        $lastUsername = $authenticationUtils->getLastUsername();            
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
    * @Route("/register", name="register")
    */
    public function register(Request $request,UserPasswordEncoderInterface $passwordEncoder )
    {
        $error="";
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(User::class);  
        if($request->isMethod('POST'))
        {
            if( $repository->findOneBy(['email'=>$request->request->get('email')]) )
                $error = "User already exist";
            if( $request->request->get('password') !== $request->request->get('password2') )
                $error = $error. " Passwords doesnt match";
            else
            {
                dd("heh") ;    
            $user = new User();
            $user->setEmail($request->request->get('email'));
            $user->setPassword($passwordEncoder->encodePassword(
                $user,
                $request->request->get('password')
            ));            
            $em->persist($user);            
            $em->flush();            
            }
        };
        
        return $this->render('register/register.html.twig',[
            'error'=>$error
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
  
}
