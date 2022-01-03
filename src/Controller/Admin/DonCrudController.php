<?php

namespace App\Controller\Admin;

use App\Entity\Don;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Don::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            /*IdField::new('id'),*/
            TextField::new('groupe'),
            /*TextEditorField::new('description'),*/
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('groupe')
            
           
        ;
    }
    
    
}
