<?php

namespace App\Controller\Admin;

use App\Entity\Operateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OperateurCrudController extends AbstractCrudController
{


    public static function getEntityFqcn(): string
    {
        return Operateur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        return [
            TextField::new('nom'),
            NumberField::new('CIN'),
            NumberField::new('telephone','Téléphone'),
            AssociationField::new('centre'),
            
        ];
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('nom')
            
           
        ;
    }
    
}
