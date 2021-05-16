<?php 
// src/Controller/Ejercicio2AController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Ejercicio2AController extends AbstractController
{
    /**
     * @Route("/ejercicios", name="ejercicios")
     */
    public function ejercicios(Request $request)
    {
        $title = 'Todos los ejercicios';

        return $this->render('ejercicios.html.twig', ['title' => $title]);
    }

    /**
     * @Route("/ejercicio2a", name="ejercicio2a")
     */
    public function ejercicio2a(Request $request)
    {
        $title = 'Ejercicio 2 a';

        return $this->render('ejercicio2a.html.twig', ['title' => $title]);
    }
}
