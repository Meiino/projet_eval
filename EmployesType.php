<?php


namespace App\Form;

use App\Entity\Employes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom' , null , [
                'label' => 'Prénom' ,
                'attr' => ['class' => 'form-label mt-4 form-control'] ,
            ])
            ->add('nom', null , [
                'label' => 'Nom' ,
                'attr' => ['class' => 'form-label mt-4 form-control'] ,
            ])
            ->add('telephone', null , [
                'label' => 'Téléphone' ,
                'attr' => ['class' => 'form-label mt-4 form-control'] ,
            ])
            ->add('email', null , [
                'label' => 'Email' ,
                'attr' => ['class' => 'form-label mt-4 form-control'] ,
            ])
            ->add('adresse', null , [
                'label' => 'Adresse' ,
                'attr' => ['class' => 'form-label mt-4 form-control'] ,
            ])
            ->add('poste', null , [
                'label' => 'Poste' ,
                'attr' => ['class' => 'form-label mt-4 form-control'] ,
            ])
            ->add('salaire', null , [
                'label' => 'Salaire' ,
                'attr' => ['class' => 'form-label mt-4 form-control'] ,
            ])
            ->add('date_de_naissance', null , [
                'label' => 'Date_de_naissance' ,
                'attr' => ['class' => 'form-label mt-4'] ,
            ])
            ->add('Creer_le_compte' , SubmitType::class , [
                'attr' => ['class' => 'btn btn-warning']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employes::class,
        ]);
    }
}
