<?php

namespace AppBundle\Form;

use AppBundle\Entity\InvoiceAttachment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

/**
 * Created by PhpStorm.
 * User: mario
 * Date: 26.10.2017
 * Time: 18:02
 */

class InvoiceAttachmentType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        // Uncomment to make it work
        $builder
//            ->add('originalName', HiddenType::class, [
//                'required' => false
//            ])
            ->add('file', VichFileType::class, array(
                'required' => false,
                'allow_delete' => false, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
                'download_label' => true
            ));


    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => InvoiceAttachment::class,
        ));
    }

}