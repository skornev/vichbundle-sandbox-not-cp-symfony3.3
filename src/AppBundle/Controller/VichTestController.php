<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 27.10.2017
 * Time: 14:42
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Invoice;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class VichTestController extends Controller
{
    /**
     * @Route("/vich", name="vich_index")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Invoice");
        $invoices = $repository->findAll();
        // replace this example code with whatever you need
        return $this->render('vich/index.html.twig', ['invoices' => $invoices]);

    }

    /**
     * @Route("/vich_new", name="vich_new")
     */
    public function newAction(Request $request)
    {

        $invoice = new Invoice();
        $form = $this->createForm('AppBundle\Form\InvoiceType', $invoice);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoice);
            $em->flush();

            $this->addFlash('success',
                'Successfully saved'
            );


            return $this->redirectToRoute('vich_index');

        }

        return $this->render(
            'vich/vich.form.html.twig',
            array('form' => $form->createView())
        );

    }

    /**
     * @Route("/vich_edit/{id}", name="vich_edit")
     */
    public function editAction(Request $request, Invoice $invoice)
    {

        $form = $this->createForm('AppBundle\Form\InvoiceType', $invoice);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoice);
            $em->flush();

            $this->addFlash('success',
                'Successfully saved'
            );


            return $this->redirectToRoute('vich_index');

        }

        return $this->render(
            'vich/vich.form.html.twig',
            array('form' => $form->createView())
        );

    }
}
