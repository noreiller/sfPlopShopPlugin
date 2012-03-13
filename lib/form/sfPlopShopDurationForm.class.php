<?php

/**
 * sfPlopShopDuration form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfPlopShopDurationForm extends BasesfPlopShopDurationForm
{
  public function configure()
  {
  	parent::configure();
		
  	unset(
  		$this['created_at'],
  		$this['updated_at']
  	);
  	
    foreach(sfPlop::get('sf_plop_cultures') as $culture)
      $this->embedForm($culture, new sfPlopShopDurationI18nForm(
        $this->getObject()->getTranslation($culture)));
  }
}
