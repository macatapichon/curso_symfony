<?php 
// src/Controller/Ejercicio2AController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Ejercicio2BController extends AbstractController
{
    // ...

    /**
     * @Route("/ejercicio2b", name="ejercicio2b")
     */
    public function ejercicio2b(Request $request)
    {
        $title = 'rojo';

        return $this->render('ejercicio2b.html.twig', ['title' => $title]);
    }
}
