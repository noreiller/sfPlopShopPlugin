<?php

class sfPlopShopPluginConfiguration extends sfPluginConfiguration
{
  public function initialize()
	{

    if(class_exists('sfPlop'))
      sfPlop::loadPlugin(array(
        'slots' => array(
          'WebsiteOffers' => 'Website offers list'
        ),
				'modules' => array(
					'sf_plop_shop_product' => array('name' => 'Shop products', 'route' => '@sf_plop_shop_product'),
    			'sf_plop_shop_category'  => array('name' => 'Shop categories', 'route' => '@sf_plop_shop_category'),
					'sf_plop_shop_order' => array('name' => 'Shop orders', 'route' => '@sf_plop_shop_order'),
					'sf_plop_shop_tax' => array('name' => 'Shop taxes', 'route' => '@sf_plop_shop_tax'),
					'sf_plop_shop_duration' => array('name' => 'Shop durations', 'route' => '@sf_plop_shop_duration'),
					'sf_plop_shop_currency' => array('name' => 'Shop currencies', 'route' => '@sf_plop_shop_currency'),
					'sf_plop_shop_company' => array('name' => 'Shop company', 'route' => '@sf_plop_shop_company')
				)
      ));
  }

}

?>
