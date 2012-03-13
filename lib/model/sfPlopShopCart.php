<?php



/**
 * Skeleton subclass for representing a row from the 'sf_plop_shop_cart' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.4-dev on:
 *
 * jeu. 26 janv. 2012 11:18:57 CET
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.plugins.sfPlopShopPlugin.lib.model
 */
class sfPlopShopCart extends BasesfPlopShopCart {

	/**
	 * Associate a product to a cart
	 * @param Integer $id The id of the product
	 */
	public function setProductId($id = null)
	{
		if ($id && $this->getId())
		{
			$cp = sfPlopShopCartProductQuery::create()
				->filterByCartId($this->getId())
				->filterByProductId($id)
				->findOne()
			;
			if (!$cp)
			{
				$cp = new sfPlopShopCartProduct();
				$cp->setCartId($this->getId());
				$cp->setProductId($id);
				$cp->save();
			}
		}
	}

	/**
	 * Dissociate a product from a cart
	 * @param Integer $id The id of the product
	 */
	public function removeProductId($id = null)
	{
		if ($id && $this->getId())
		{
			$cp = sfPlopShopCartProductQuery::create()
				->filterByCartId($this->getId())
				->filterByProductId($id)
				->deleteAll()
			;
		}
		
	}

	/**
	 * @see getsfPlopShopCartProducts()
	 */
	public function getProducts()
	{
    return sfPlopShopProductQuery::create()
      ->usesfPlopShopCartProductQuery()
      	->filterByCartId($this->getId())
      ->endUse()
      ->find()
    ;
	}

} // sfPlopShopCart
