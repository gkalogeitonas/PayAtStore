<?php
class ControllerExtensionPaymentPayAtStore extends Controller {
	public function index() {
		$data['continue'] = $this->url->link('checkout/success');

		return $this->load->view('extension/payment/payatstore', $data);
	}

	public function confirm() {
		if ($this->session->data['payment_method']['code'] == 'payatstore') {
			$this->load->model('checkout/order');

			$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('payment_payatstore_order_status_id'));
		}
	}
}
