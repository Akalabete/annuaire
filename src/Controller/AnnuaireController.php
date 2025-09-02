<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AnnuaireController extends AbstractController
{
    #[Route('/annuaire', name: 'app_annuaire')]
    public function index(): Response
    {
        return $this->render('annuaire/index.html.twig', [
            'controller_name' => 'AnnuaireController',
        ]);
    }
}
