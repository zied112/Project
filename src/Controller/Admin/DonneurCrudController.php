<?php

namespace App\Controller\Admin;

use App\Entity\Donneur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DonneurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Donneur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            NumberField::new('age'),
            NumberField::new('CIN'),
            NumberField::new('telephone','Téléphone'),
            TextEditorField::new('adresse'),
            AssociationField::new('don'),
            AssociationField::new('operateur'),
            AssociationField::new('centre'),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        
    
        return $filters
            ->add('don') 
        ;
    }
    
    
}
