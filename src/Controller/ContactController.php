<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {


        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            $task = $form->getData();

            $emailSend = (new Email())
                ->from($task['email'])
                ->to('jeremyrossi123@gmail.com')
                ->subject('portfolio mail')
                ->text($task['name'].','.\PHP_EOL.\PHP_EOL.$task['message'],
                    'text/plain');

            ;

            try {
                $mailer->send($emailSend);

                $this->addFlash('success', '✔️ Votre message a bien été envoyer !');
            } catch (TransportExceptionInterface $e) {
                $this->addFlash('erreur', '❌️ Votre message n\' a pas pu être envoyer');
            }

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }
}
