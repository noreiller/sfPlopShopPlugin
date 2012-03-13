<?php

/**
 * sfPlopShopCompany form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfPlopShopCompanyForm extends BasesfPlopShopCompanyForm
{
  public function configure()
  {
  	parent::configure();

  	unset(
  		$this['created_at'],
  		$this['updated_at']
  	);
  	
  	$this->widgetSchema['description'] = new sfWidgetFormPlopRichText();
  }
}
