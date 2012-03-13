<?php



/**
 * Skeleton subclass for performing query and update operations on the 'sf_plop_shop_product' table.
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
class sfPlopShopProductQuery extends BasesfPlopShopProductQuery {
  
  public function filterByCategoryName($s)
  {
    return $this
      ->usesfPlopShopCategoryQuery()
        ->filterByName($s)
      ->endUse()
    ;
  }

  /**
   * Filter with published and active products
   * 
   * @return Object    Criteria
   */
  public function getValid()
  {
    return $this
      ->filterByIsPublished(true)
      ->filterByIsActive(true)
    ;
  }

} // sfPlopShopProductQuery
