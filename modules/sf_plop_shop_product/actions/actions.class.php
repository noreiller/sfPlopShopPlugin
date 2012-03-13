<?php

require_once dirname(__FILE__).'/../lib/sf_plop_shop_productGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sf_plop_shop_productGeneratorHelper.class.php';

/**
 * sf_plop_shop_product actions.
 *
 * @package    plop
 * @subpackage sf_plop_shop_product
 * @author     Aurélien MANCA <aurelien.manca@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class sf_plop_shop_productActions extends autoSf_plop_shop_productActions
{
  public function preExecute()
  {
    $module = 'sf_plop_shop_product';
    if (!in_array($module, array_keys(sfPlop::getSafePluginModules())))
      $this->forward404();

    if (!$this->getUser()->isAuthenticated())
      $this->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));

    if (!$this->getUser()->hasCredential($module))
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));

    parent::preExecute();

    $user = $this->getUser();
    $user->setCulture($user->getProfile()->getCulture());

    ProjectConfiguration::getActive()->LoadHelpers(array('I18N'));
    $this->getResponse()->setTitle(sfPlop::setMetaTitle(__('Shop products', '', 'plopAdmin')));
  }
}
