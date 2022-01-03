<?php

namespace App\Controller\Admin;

use App\Entity\Don;
use App\Entity\Centre;
use App\Entity\Donneur;
use App\Entity\Operateur;
use App\Repository\UserRepository;
use App\Repository\CentreRepository;
use App\Repository\DonneurRepository;
use App\Repository\OperateurRepository;
use App\Form\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\DonneurCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class BDDshbrdController extends AbstractDashboardController
{

    protected $centreRepository;
    protected $donneurRepository;
    protected $operateurRepository;
    protected $userRepository;

    public function __construct( 
        CentreRepository $centreRepository,
        DonneurRepository $donneurRepository,
        OperateurRepository $operateurRepository,
        UserRepository $userRepository
    )
    {
        $this->centreRepository = $centreRepository;
        $this->donneurRepository = $donneurRepository;
        $this->operateurRepository = $operateurRepository;
        $this->userRepository = $userRepository;
    }


    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(DonneurCrudController::class)->generateUrl());
    }

   
    public function getCentreName(Request $request, CentreRepository $centreRepository){

        $centreName = $request->query->get('nom');
        echo nom;

    }

   // /**
   //  * @Route("/stats", name="stats")
   //  */
   /* public function index2(): Response
    {
        
        $centreName = 'Clinique essalem';
        //$donneur = $this->donneurRepository->countAllDonsByCentre();
        $donneur = $this->donneurRepository->findAll();
        //dd($centreObject);
        
        return $this->render('stats.html.twig', [
            'countAllDonators' => $this->donneurRepository->countAllDonators(), 
            'donneur' => $donneur
        ]);
    }*/

    /**
     * @Route("/stats", name="stats")
     * @param Request $request
     * @param CentreRepository $centreRepository
     * @return Response
     */
    public function index2(Request $request, CentreRepository $centreRepository)
    {

        $nom=$request->attributes->get('nom');
        $donneur = $this->donneurRepository->findAll(); 
    return $this->render('stats.html.twig',['donneur'=>$donneur, 'nom'=>$nom]);
    
}





    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tbara3')
            ->disableUrlSignatures();
    }

    /**
     * @Route("rechercherDonneur", name="rechercherDonneur")
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

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Donneur', 'fas fa-hand-holding-water', Donneur::class);
        yield MenuItem::linkToCrud('Operateur', 'fas fa-user-nurse', Operateur::class);
        yield MenuItem::linkToCrud('Centre', 'fas fa-hospital', Centre::class);
        yield MenuItem::linkToCrud('Don', 'fas fa-syringe', Don::class);
        yield MenuItem::linkToLogout('Déconnecter', 'fas fa-sign-out-alt');
    }

    

    




}
