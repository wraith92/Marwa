<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
class UserCrudController extends AbstractCrudController
{
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $passwordField = TextField::new('password')->hideOnIndex();

        if ($pageName === Crud::PAGE_NEW || $pageName === Crud::PAGE_EDIT) {
            $passwordField->setFormTypeOption('empty_data', '')
                ->setFormTypeOption('attr', ['autocomplete' => 'new-password'])
                ->setFormTypeOption('help', 'Leave it blank if you don\'t want to change the password')
                ->setHelp('The password will be hashed automatically.');
        }

        return [
            TextField::new('email'),
            $passwordField,
        ];
    }


}
