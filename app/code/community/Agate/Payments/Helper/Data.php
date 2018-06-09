<?php
class Agate_Payments_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function debugData($debugData)
    {
        if (true === isset($debugData) && false === empty($debugData)) {
            \Mage::getModel('agate/PaymentMethod')->debugData($debugData);
        }
    }

	public function getSettings()
	{
		$params = array(
         'apikey' => \Mage::getStoreConfig('payment/agate/apikey'),
			   'invoice_created' => \Mage::getStoreConfig('payment/agate/invoice_created'),
			   'invoice_paid' => \Mage::getStoreConfig('payment/agate/invoice_paid'),
			   'invoice_completed' => \Mage::getStoreConfig('payment/agate/invoice_completed'),
			   'invoice_expired' => \Mage::getStoreConfig('payment/agate/invoice_expired'),
			   'invoice_cancelled' => \Mage::getStoreConfig('payment/agate/invoice_cancelled'),
            );

		return $params;
	}
}
?>
