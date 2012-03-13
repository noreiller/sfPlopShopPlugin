<?php 

class sfPlopShopPayment
{
  /**
   * Get the Paypal instance configured with the application settings
   * @return Object A prestaPaypal object
   */
  public static function getPaypal()
  {
    $path = sfConfig::get('app_paypal_sdk_path');
    if ($path)
      $path = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR . $path;
    else
      $path = sfConfig::get('sf_plugins_dir') . DIRECTORY_SEPARATOR . 'prestaPaypalPlugin' . DIRECTORY_SEPARATOR . 'sdk' . DIRECTORY_SEPARATOR . 'lib';

    $paypal = new prestaPaypal($path);
    $paypal->setUserName(sfConfig::get('app_paypal_user'));
    $paypal->setPassword(sfConfig::get('app_paypal_password'));
    $paypal->setSignature(sfConfig::get('app_paypal_signature'));
    $paypal->setTestMode(sfConfig::get('app_paypal_test_mode'));

    return $paypal;
  }

  /**
   * Get the url of the Paypal button image
   * @param  String $culture The culture/locale
   * @return String
   */
  public static function getPaypalImageButton($culture)
  {
    if (!$culture)
      $culture = sfConfig::get('sf_default_culture');

    if (strpos($culture, '_') === false)
      $culture = $culture . '_' . strtoupper($culture);

    if ($culture == 'en_EN')
      $culture = 'en_GB';
  
    return 'https://fpdbs.paypal.com/dynamicimageweb?cmd=_dynamic-image'
      . '&buttontype=ecmark'
      . '&locale=' . $culture
      . '&pal=' . sfConfig::get('app_paypal_merchant_id')
    ;
  }
}

?>