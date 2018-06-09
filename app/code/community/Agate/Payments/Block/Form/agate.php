<?php
class Agate_Payments_Block_Form_Agate extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        $payment_template = 'agate/form/agate.phtml';

        parent::_construct();

        $this->setTemplate($payment_template);
    }
}
