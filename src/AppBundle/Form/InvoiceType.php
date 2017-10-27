<?php
namespace AppBundle\Form;

use AppBundle\Entity\Invoice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Created by PhpStorm.
 * User: mario
 * Date: 26.10.2017
 * Time: 18:00
 */


class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('number')
        ->add('attachments', CollectionType::class, array(
            'allow_add' => true,
            'allow_delete' => true,
            'entry_type' => InvoiceAttachmentType::class,
            'by_reference' => false
        ))
        ->add('addInvoiceAttachment', ButtonType::class, ['attr' => ['class' => 'btn btn-primary btn-xs']])
        ->add('save', SubmitType::class);

}

    public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
        'data_class' => Invoice::class,
    ));
}

}