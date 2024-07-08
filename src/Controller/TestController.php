<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\TodoList;
use App\Form\Type\EmailType;
use App\Form\Type\TodoListFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/test/form')]
    public function form(): Response
    {

        return $this->render('test/form.html.twig', [
            'isSuccessful' => false
        ]);
    }

    #[Route('/test/todo')]
    public function todoList(): Response
    {
        $myTodo = new TodoList();
        $form = $this->createForm(TodoListFormType::class, $myTodo, [
            'action' => $this->generateUrl('todoSave'),
            'method' => 'POST'
        ]);

        if ($form->isSubmitted() && $form->isValid()) {
            exit("Form is valid:SAVE");
        }

        return $this->render('test/todo.html.twig', [
            'mytodoList' => $myTodo,
            'myForm' => $form
        ]);
    }

    #[Route('/test/todo/save', 'todoSave')]
    public function todoListSave(Request $request): Response
    {
        exit("todoListSave");
    }
}