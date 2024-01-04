<?php

namespace App\Controller\Admin;

use App\Entity\PlatformsProducts;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlatformsProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PlatformsProducts::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Plateforme')
            ->setEntityLabelInPlural('Plateformes')
            ->setPageTitle('index', 'Liste des %entity_label_plural%')
            ->setPageTitle('new', 'Ajouter un %entity_label_singular%')
            ->setPageTitle('edit', 'Modifier un %entity_label_singular%')
            ->setPageTitle('detail', 'Détails du %entity_label_singular%')
            ->setDefaultSort(['id' => 'DESC'])
            ->setPaginatorPageSize(10);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter une plateforme');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Ajouter une autre plateforme');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Ajouter et ajouter une autre plateforme');
            })
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setLabel('Voir');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_DETAIL, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_DETAIL, Action::INDEX, function (Action $action) {
                return $action->setLabel('Retour à la liste');
            })
            ->update(Crud::PAGE_DETAIL, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Modifier et retourner à la liste');
            })
            ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE)
            ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('platform', 'Plateforme');
        yield SlugField::new('slug', 'Slug')->setTargetFieldName('platform');
        yield TextField::new(('pictureFile'), 'Logo')
            ->setFormType(VichImageType::class)
            ->onlyOnForms();
        yield ImageField::new('pictureName', 'Logo')
            ->setBasePath('/uploads/platsforms')
            ->onlyOnIndex();
    }
    
}
