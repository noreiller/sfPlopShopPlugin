<?php

/**
 * sfPlopShopProduct form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class sfPlopShopProductForm extends BasesfPlopShopProductForm
{
  public function configure()
  {
  	parent::configure();

    unset(
      $this['created_at'],
      $this['updated_at']
    );

    $this->widgetSchema['image_id'] = new sfWidgetFormAssetExtraInput();

    foreach(sfPlop::get('sf_plop_cultures') as $culture)
      $this->embedForm($culture, new sfPlopShopProductI18nForm(
        $this->getObject()->getTranslation($culture)));
  }
}
