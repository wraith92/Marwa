<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class HomeController extends AbstractController
{
    private $authorizationChecker;

    public function __construct(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
         // Check if the user has a specific role
         if ($this->authorizationChecker->isGranted('ROLE_USER')) {
            // Generate a link for users with the 'ROLE_ADMIN' role
            $adminLink = $this->generateUrl('admin');

            // ...
            // Additional logic for the 'ROLE_ADMIN' role
            // ...
        }



        // ...
        // Additional logic for all users
        // ...

        // Render your template and pass the generated links
        return $this->render('/pages/home.html.twig', [
            'controller_name' => 'HomeController',
            'adminLink' => $adminLink ?? null,

        ]);
    }
}
