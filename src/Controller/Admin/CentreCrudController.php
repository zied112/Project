<?php

namespace App\Controller\Admin;

use App\Entity\Centre;
use App\Entity\Operateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CentreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Centre::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $getCentreName = Action::new('getCentreName', 'Stats')
            ->linkToRoute('stats',function(Centre $entity){
                return [
                    'nom' => $entity->getNom()
                ];
            })

;
        return $actions
            ->add(Crud::PAGE_INDEX,$getCentreName);


    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            /*IdField::new('id'),*/
            TextField::new('nom','Clinique'),
            TextField::new('adresse'),
            AssociationField::new('operateurs'),
            AssociationField::new('donneurs'),
            
        ];
    }
    
  /* public function listeDonneur(Operateur $operateur){
        listeDonneur = operateur.donneur;
    }*/
}
