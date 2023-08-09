<?php
class ModelExtensionPaymentPayAtStore extends Model {
	public function getMethod($address, $total) {
		$this->load->language('extension/payment/payatstore');


		if ((isset($this->session->data['shipping_method']) && $this->session->data['shipping_method']['code']=='pickup.pickup') OR (isset($this->session->data['api_id']) && $this->session->data['api_id']==1)){
		  $status  = true;
	  }else{
			$status=false;
		}

		$method_data = array();

		if ($status) {
			$method_data = array(
				'code'       => 'payatstore',
				'title'      => $this->language->get('text_title'),
				'terms'      => '',
				'sort_order' => $this->config->get('payment_payatstore_sort_order')
			);
		}

		return $method_data;
	}
}
