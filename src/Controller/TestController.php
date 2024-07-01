<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/test/number')]
    public function number(): Response
    {
        /*$number = random_int(0, 100);return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );*/
        return $this->render('test/test.html.twig', []);

    }
}