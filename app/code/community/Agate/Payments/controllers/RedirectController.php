<?php
class Agate_Payments_RedirectController extends Mage_Core_Controller_Front_Action
{
  public function indexAction() {
		$this->loadLayout();
        $block = $this->getLayout()->createBlock('Mage_Core_Block_Template','agate',array('template' => 'agate/formBlock.phtml'));
		    $this->getLayout()->getBlock('content')->append($block);
        $this->renderLayout();
	}
}
