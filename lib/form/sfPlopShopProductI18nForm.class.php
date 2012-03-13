<?php

/**
 * sfPlopShopProductI18n form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfPlopShopProductI18nForm extends BasesfPlopShopProductI18nForm
{
  public function configure()
  {
  	parent::configure();

  	$this->widgetSchema['description'] = new sfWidgetFormPlopRichText();

    $this->validatorSchema['locale'] = new sfValidatorChoice(array(
      'choices' => sfPlop::get('sf_plop_cultures')
    ));
  }
}
