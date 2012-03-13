<?php

/**
 * sfPlopShopOrder form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfPlopShopOrderForm extends BasesfPlopShopOrderForm
{
  public function configure()
  {
  	unset(
  		$this['created_at'],
  		$this['updated_at']
  	);
  }
}
