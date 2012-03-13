<?php

/**
 * sfPlopPublicShopOrder form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfPlopPublicShopOrderForm extends BasesfPlopShopOrderForm
{
  public function configure()
  {
    unset(
      $this['valid_from_date'],
      $this['valid_to_date'],
      $this['cart_id'],
      $this['user_id'],
      $this['product_id'],
      $this['is_paid'],
      $this['is_ready'],
      $this['in_process'],
      $this['currency_id'],
      $this['total_price'],
      $this['total_tax'],
      $this['total_net_price'],
      $this['total_amount'],
      $this['created_at'],
      $this['updated_at']
    );

    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('plopAdmin');
    
    $this->widgetSchema['duration_id'] = new sfWidgetFormPlopOrderDurationChoice(array(
      'order' => $this->getObject()
    ));

		if ($this->getOption('user_with_address'))
		{
			$this->widgetSchema['address_id'] = new sfWidgetFormPropelChoice(array(
				'model' => 'sfGuardUserAddress'
			));
			$this->validatorSchema['address_id'] = new sfValidatorPropelChoice(array(
				'model' => 'sfGuardUserAddress',
				'column' => 'id',
				'required' => true
			));
    }
    else
    {
      unset($this['address_id']);
      $this->embedForm('address', new sfGuardUserAddressForm(null, array(
        'user_id' => $this->getObject()->getUserId(),
        'user_culture' => $this->getOption('user_culture'),
      )));
		}
  }

  /**
   * Update the address_id of the order after the object has been saved
   */
  public function saveEmbeddedForms($con = null, $forms = null)
  {
		parent::saveEmbeddedForms($con);

    if (in_array('address', array_keys($this->embeddedForms)))
    {
      $this->getObject()->setsfGuardUserAddress($this->getEmbeddedForm('address')->getObject());
      $this->getObject()->save($con);
    }

  }
}
