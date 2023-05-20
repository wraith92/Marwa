<?php

namespace App\Controller\Admin;

use App\Entity\Promotion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\PercentField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PromotionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Promotion::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('remise')->formatValue(function ($value) {
                return $value !== null ? $value . '%' : null;
            }),
            DateField::new('date_debut'),
            DateField::new('date_fn'),
        ];
    }

}
