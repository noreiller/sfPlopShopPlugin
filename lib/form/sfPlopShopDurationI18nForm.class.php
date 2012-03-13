<?php

/**
 * sfPlopShopDurationI18n form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfPlopShopDurationI18nForm extends BasesfPlopShopDurationI18nForm
{
  public function configure()
  {
    $this->validatorSchema['locale'] = new sfValidatorChoice(array(
      'choices' => sfPlop::get('sf_plop_cultures')
    ));
  }
}
