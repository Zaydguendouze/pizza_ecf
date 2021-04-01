<?php

namespace App\Form;

use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ingredient_name', TextType::class, ["label" => "Nom de l'ingrédient",
                "attr" => ["class" => "mt-3 mb-3"]
                ])
            ->add('ingredient_price', NumberType::class, ["label" => "Prix de l'ingrédient",
                "attr" => ["class" => "mt-3 mb-3"]
                ])
            ->add('vegetarian', ChoiceType::class, ["label" => "Ingrédient végétarien?",
                "attr" => ["class" => "mt-3 mb-3"],
            "choices" => [
            "Oui" => true, "Non" => false ]
            ])
            ->add('vegan', ChoiceType::class, ["label" => "Ingrédient végan?",
                "attr" => ["class" => "mt-3 mb-3"],
                "choices" => [
                    "Oui" => true, "Non" => false ]
            ])
            //->add('pizzas')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ingredient::class,
        ]);
    }
}
