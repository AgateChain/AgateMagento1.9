<?php

class Agate_Payments_Model_PaymentMethod extends Mage_Payment_Model_Method_Abstract
{
    protected $_code = 'agate';
    protected $_isGateway                   = true;
    protected $_canAuthorize                = true;
    protected $_canCapture                  = false;
    protected $_canUseInternal              = false;
    protected $_isInitializeNeeded          = false;
    protected $_canFetchTransactionInfo     = false;
    protected $_canManagerRecurringProfiles = false;
    protected $_canUseCheckout              = true;
    protected $_canUseForMultishipping      = true;
    protected $_canCapturePartial           = false;
    protected $_canRefund                   = false;
    protected $_canVoid                     = false;
	protected static $_redirectUrl;

	public function createFormBlock($name)
    {
        $block = $this->getLayout()->createBlock('agate/form_agate', $name)
            ->setMethod('agate')
            ->setPayment($this->getPayment())
            ->setTemplate('agate/formBlock.phtml');

        return $block;
    }

   	public function authorize(Varien_Object $payment, $amount)
    {
		if (false === isset($payment) || false === isset($amount) || true === empty($payment) || true === empty($amount)) {
            $this->debugData('[ERROR] In Agate_Payments_Model_PaymentMethod::authorize(): missing payment or amount parameters.');
            throw new \Exception('In Agate_Payments_Model_PaymentMethod::authorize(): missing payment or amount parameters.');
        }

    $order = $payment->getOrder();

    $redirect_url   = \Mage::getUrl('agate/callback', array('_secure' => true));
    $order_total    = $amount;
    $baseUri        = "http://gateway.agate.services/" ;
    $convertUrl     = "http://gateway.agate.services/convert/";
    $api_key        = \Mage::getStoreConfig('payment/agate/apikey');
    $currencySymbol = $order->getBaseCurrencyCode();

    $amount_iUSD = $this->convertCurToIUSD($convertUrl, $order_total, $api_key, $currencySymbol);

    $params = array(
      'baseUri'        => $baseUri,
      'amount_iUSD'    => $amount_iUSD,
      'order_total'    => $order_total,
      'currencySymbol' => $currencySymbol,
      'api_key'        => $api_key,
      'redirect_url'   => $redirect_url
   );

    Mage::getSingleton('checkout/session')->setSessionVariable($params);

    return $this;

	}

  public function getOrderPlaceRedirectUrl()
    {
      return Mage::getUrl('agate/redirect', array('_secure' => true));
    }

  private function convertCurToIUSD($url, $amount, $api_key, $currencySymbol) {
     error_log("Entered into Convert CAmount");
     error_log($url.'?api_key='.$api_key.'&currency='.$currencySymbol.'&amount='. $amount);
     $ch = curl_init($url.'?api_key='.$api_key.'&currency='.$currencySymbol.'&amount='. $amount);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json')
   );

   $result = curl_exec($ch);
   $data = json_decode( $result , true);
   error_log('Response =>'. var_export($data, TRUE));
   // Return the equivalent value acquired from Agate server.
   return (float) $data["result"];

   }

    private function Agate_DecodeResponse($data)
        {
            $response = json_decode( $data , true );

            return $response;
        }
}
?>
