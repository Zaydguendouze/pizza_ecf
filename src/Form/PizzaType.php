<?php

namespace App\Form;

use App\Entity\Base;
use App\Entity\Ingredient;
use App\Entity\Pizza;
use App\Entity\Size;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pizza_name', TextType::class, ["label" => "Nom de la Pizza"])
            ->add('pizza_base', EntityType::class, [
                "class" => Base::class,
                "choice_label" => "base_name"
            ])
            ->add('pizza_size', EntityType::class, [
                "class" => Size::class,
                "choice_label" => "size_name"
            ])
            ->add('pizza_ingredients', EntityType::class, [
                "class" => Ingredient::class,
               "choice_label" => "ingredient_name",
                "expanded" => true,
                "multiple" => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pizza::class,
        ]);
    }
}
