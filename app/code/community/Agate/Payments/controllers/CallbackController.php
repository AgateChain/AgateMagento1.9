<?php
class Agate_Payments_CallbackController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        if (ini_get('allow_url_fopen') === false) {
            ini_set('allow_url_fopen', true);
        }

        // $settings = \Mage::helper('agate')->getSettings();

        // $this->debugData('The data was received = callback ' . $json );

        // $order = \Mage::getModel('sales/order')->loadByIncrementId($_POST["orderNo"]);
        //
        //   $this->debugData('The data was received '.
        //   'orderNo =' . $_POST["orderNo"].
        //   'stateId =' . $_POST["stateId"].
        //   'referenceNo =' . $_POST["referenceNo"]);


        // if (!$_POST["stateId"]){
          // $this->debugData('WebHook - OrderId: ' . $orderId . ' is now Expired.');
          //
          // $newStatus = $settings['invoice_expired'];
          // $order->addStatusToHistory($newStatus, sprintf('Agate has rejected the payment. (Payment expired)'));
          // $order->save();

  				Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/failure', array('_secure'=>true));
        // }

    }

	function DecodeResponse($data)
	{
		$response = json_decode( $data,true );

		return $response;
	}

	function debugData($data)
	{
		\Mage::helper('agate')->debugData($data);
	}


}
