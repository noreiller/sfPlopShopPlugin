<?php
/**
 * Displays a select box with the available durations.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage widget
 * @author     ##AUTHOR_NAME##
 */
class sfWidgetFormPlopOrderDurationChoice extends sfWidgetFormChoice
{
  public function configure($options = array(), $attributes = array())
  {
    $this->addOption('add_empty', false);
    $this->addOption('order', null);

    parent::configure($options, $attributes);

    $this->setOption('choices', array());
  }

  public function getChoices()
  {
    $durations = sfPlopShopDurationQuery::create()->find();
    $order_price = $this->options['order']->getTotalNetPrice();
    $order_currency = ' ' . $this->options['order']->getCurrency();
    
    foreach($durations as $duration)
    {
      $factor = $duration->getMonthFactor();
      $price = $factor * $order_price;
      $choices [$duration->getId()]=
        $duration->getDescription() . ($factor
        ? ' (' . $price . ' ' . $order_currency . ')'
        : null
      );
    }

    if ($this->options['add_empty'] === true)
      $choices = array('' => '') + $choices;

    return $choices;
  }
}
