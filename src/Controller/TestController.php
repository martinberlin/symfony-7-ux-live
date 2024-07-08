<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\TodoItem;
use App\Entity\TodoList;
use App\Form\Type\EmailType;
use App\Form\Type\TodoListFormType;
use App\Repository\TodoListRepository;
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


    #[Route('/test/todo', name: 'todolist', defaults: ['id' => null])]
    public function todoList(Request $request, TodoListRepository $todoListRepository, ?TodoList $todoList = null): Response
    {
        if (!$todoList) {
            $todoList = new TodoList();
            $todoList->addTodoItem(new TodoItem());
        }
        $form = $this->createForm(TodoListFormType::class, $todoList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $todoListRepository->add($form->getData(), true);
            $this->addFlash('live_demo_success', 'Excellent! With this to-do list, I won’t miss anything.');

            return $this->redirectToRoute('todolist', [
                'id' => $todoList->getId(),
            ]);

        }

        return $this->render('test/todo.html.twig', [
            'mytodoList' => $todoList,
            'myForm' => $form
        ]);
    }

}