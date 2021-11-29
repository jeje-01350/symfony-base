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
    public function index(Request $request): Response
    {


        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            $task = $form->getData();

            return $this->redirectToRoute('email', ["name"=>urlencode($task['name']), "message"=>urlencode($task['message']), "email"=>urlencode($task['email'])]);
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/email/{name}-{email}-{message}", name="email")
     */
    public function email(MailerInterface $mailer, RequestStack $requestStack,$name,$email,$message){



        $emailSend = (new Email())
                        ->from(urldecode($email))
                        ->to('bjtechnodev@gmail.com')
                        ->subject('symfony mail')
                        ->text(urldecode($name).','.\PHP_EOL.urldecode($message),
                            'text/plain');

        ;

        try {
            $mailer->send($emailSend);
        } catch (TransportExceptionInterface $e) {
        }

        return $this->redirectToRoute('contact');
    }
}
