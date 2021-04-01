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


            ->add('pizza_name', TextType::class, ["label" => "Nom de la Pizza"
                ,
                "attr" => ["class" => "mt-3 mb-3"]
            ])
            ->add('pizza_base', EntityType::class, [
                "label" => "Base de la pizza",
                "attr" => ["class" => "mt-3 mb-3"],
                "class" => Base::class,
                "choice_label" => function ($base) {
                    return $base->getBaseName() . " - " . $base->getBasePrice() ."€";
                }
            ])
            ->add('pizza_size', EntityType::class, [
                "attr" => ["class" => "mt-3 mb-3"],
                "label" => "Taille de la pizza",
                "class" => Size::class,
                "choice_label" => function ($size) {
                    return $size->getSizeName() . " - " . $size->getSizePrice() ."€";
                }
            ])
            ->add('pizza_ingredients', EntityType::class, [
                "attr" => ["class" => "mt-3 mb-3"],
                "label" => "Ingrédients de la pizza",
                "class" => Ingredient::class,
                "choice_label" => function ($ingredient) {
                    return $ingredient->getIngredientName() . " - " . $ingredient->getIngredientPrice() ."€";
                },
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
