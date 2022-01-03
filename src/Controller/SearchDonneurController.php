<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchDonneurController extends AbstractController
{
    /**
     * @Route("/search/donneur", name="search_donneur")
     */
    public function searchDonneur(Request $request , DonneurRepository $repository): Response
    {
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);
        //if ($form->isSubmitted() && $form->isValid()) {
            $type = $form->get('type')->getData();
            $list = $repository->filter($type);
            

           
       // }
        return $this->render('search.html.twig',[ 'form' => $form->createView(),'list'=>$list
    
    ]); 
            
    }
}
