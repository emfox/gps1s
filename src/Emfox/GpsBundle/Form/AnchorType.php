<?php

namespace Emfox\GpsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnchorType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null,array('label' => '名称'))
            ->add('enabled',null,array('label' => '是否启用','data' => true))
            ->add('lng',null,array('label' => '经度'))
            ->add('lat',null,array('label' => '纬度'))
            ->add('icon','choice',array('choices' =>  $this->getIconChoices(),'label' => '图标','expanded'=>true))
        ;
    }
    public function getIconChoices()
    {
    	$icon_path = 'bundles/emfoxgps/images/anchors';
    	$icon_asset_path = '/bundles/emfoxgps/images/anchors/';
    	$dh  = opendir($icon_path);
    	while (false !== ($filename = readdir($dh))) {
    		if($filename != '.' && $filename != '..')
    		$icons_choices[$filename] = '<img src="' . $icon_asset_path . $filename . '" />';
    	}
    	return $icons_choices;
    }
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Emfox\GpsBundle\Entity\Anchor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'emfox_gpsbundle_anchor';
    }
}