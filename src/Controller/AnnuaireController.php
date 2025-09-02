<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class AnnuaireController extends AbstractController
{
    /**
     * Méthode privée pour centraliser la logique de détection d'utilisateur
     * Retourne un tableau avec toutes les informations nécessaires
     */
    private function getUserContext(): array
    {
        // Vérifier si l'utilisateur est connecté
        $user = $this->getUser();
        $isAuthenticated = $user !== null;
        
        // Vérifier si l'utilisateur a renseigné sa géolocalisation
        $hasGeolocation = false;
        $userLocation = null;
        
        if ($isAuthenticated) {
            // Ici vous pourrez récupérer la géolocalisation depuis la base de données
            // $userLocation = $user->getLocation(); // Exemple
            // $hasGeolocation = $userLocation !== null;
            
            // Pour l'instant, simulation
            $hasGeolocation = false; // À remplacer par votre logique
        }
        
        // Déterminer le type d'affichage
        $displayMode = 'visitor'; // Par défaut
        if ($isAuthenticated && $hasGeolocation) {
            $displayMode = 'authenticated_geolocated';
        } elseif ($isAuthenticated) {
            $displayMode = 'authenticated_no_geolocation';
        }
        
        return [
            'display_mode' => $displayMode,
            'is_authenticated' => $isAuthenticated,
            'has_geolocation' => $hasGeolocation,
            'user_location' => $userLocation,
            'user' => $user,
        ];
    }

    // Affiche la liste des catégories
    #[Route('/annuaire', name: 'annuaire.index')]
    public function index(Request $request): Response
    {
        $userContext = $this->getUserContext();
        
        return $this->render('annuaire/index.html.twig', $userContext);
    }

    // Affiche la liste des sous-catégories d'une catégorie
    #[Route('/annuaire/{category}', name: 'annuaire.category')]
    public function showSubCategories(Request $request, string $category): Response
    {
        $userContext = $this->getUserContext();
        
        // Ici vous pourrez récupérer les sous-catégories depuis la base de données
        // $subcategories = $this->getSubcategoriesByCategory($category, $userContext);
        
        return $this->render('annuaire/category.html.twig', array_merge($userContext, [
            'category' => $category,
            'subcategories' => [], // À remplacer par vos données
        ]));
    }

    // Affiche la liste des services d'une sous-catégorie
    #[Route('/annuaire/{category}/{subcategory}', name: 'annuaire.subcategory')]
    public function showServices(Request $request, string $category, string $subcategory): Response
    {
        $userContext = $this->getUserContext();
        
        // Ici vous pourrez récupérer les services depuis la base de données
        // $services = $this->getServicesBySubcategory($category, $subcategory, $userContext);
        
        return $this->render('annuaire/subcategory.html.twig', array_merge($userContext, [
            'category' => $category,
            'subcategory' => $subcategory,
            'services' => [], // À remplacer par vos données
        ]));
    }

    // Affiche la fiche détaillée d'un service
    #[Route('/annuaire/{category}/{subcategory}/{id}', name: 'annuaire.service')]
    public function showService(Request $request, string $category, string $subcategory, int $id): Response
    {
        $userContext = $this->getUserContext();
        
        // Ici vous pourrez récupérer le service depuis la base de données
        // $service = $this->getServiceById($id, $userContext);
        
        return $this->render('annuaire/service.html.twig', array_merge($userContext, [
            'category' => $category,
            'subcategory' => $subcategory,
            'service_id' => $id,
            'service' => null, // À remplacer par vos données
        ]));
    }
}
