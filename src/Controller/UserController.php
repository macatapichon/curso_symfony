<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use App\Entity\User;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserController extends AbstractController{

    
    /**
     * @Route("/login", name="login", methods={"GET","POST"})
     */
    public function login(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('email', TextType::class, ['required' => true])
            ->add('password', PasswordType::class, ['required' => true])
            ->add('ingresar', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $existe = $em->getRepository('App:User')->existe($data['email'], $data['password']);

            if ($existe) {
                $request->getSession()->getFlashBag()->add('login_success', 'APA LALA te logueaste correctamente!!!');
                return $this->redirectToRoute('login_success');
            } else {
                $request->getSession()->getFlashBag()->add('login_error', 'Usuario y/o Password Incorrectos');
            }
        }

        return $this->render('login.html.twig', [
            'form' => $form->createView()
        ]);
    }  

    /**
     * @Route("/login_success", name="login_success", methods={"GET","POST"})
     */
    public function login_success(Request $request): Response
    {
        return $this->render('login_success.html.twig');
    }
}