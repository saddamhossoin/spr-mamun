<?php
class AuthorizeNetComponent extends Component {

////////////////////////////////////////////////////////////

	private $url = null;
	private $api_login = null;
	private $transaction_key = null;

////////////////////////////////////////////////////////////

	public function __construct() {
	}
 
////////////////////////////////////////////////////////////

	public function initialize(Controller $controller) {
 
		$this->api_url ="https://test.authorize.net/gateway/transact.dll";
		//"https://secure.authorize.net/gateway/transact.dll";
		$this->api_login = "7Le9Ny93A";//"7CtBfK94b";
		$this->api_transaction_key = "66hSwa3chK5M6a59";//"7XS9a4b6m4sbS52Q"

	}

////////////////////////////////////////////////////////////

	public function charge($data, $payment) {
	//echo $data['total'];die();

		$post_values = array(

			'x_login'               => $this->api_login,
			'x_tran_key'            => $this->api_transaction_key,

			'x_version'             => '3.1',
			'x_delim_data'          => 'TRUE',
			'x_delim_char'          => ',',
			'x_encap_char'          => '"',
			'x_relay_response'      => 'FALSE',

			'x_type'                => 'AUTH_CAPTURE',
			'x_method'              => 'CC',

			'x_card_num'            => $payment['creditcard_number'],
			'x_exp_date'            => $payment['creditcard_month'] . $payment['creditcard_year'],
			'x_card_code'           => $payment['creditcard_code'],

			'x_invoice_num'         => '',
			'x_tax'                 => '0.00',
			'x_amount'              => $data['total'],

			'x_description'         => '',

			'x_first_name'          => $data['first_name'],
			'x_last_name'           => $data['last_name'],

			'x_address'             => $data['billing_address'],
			'x_city'                => $data['billing_city'],
			'x_state'               => $data['billing_state'],
			'x_zip'                 => $data['billing_zip'],
			'x_country'             => 'United States',

			'x_ship_to_first_name'  => $data['first_name'],
			'x_ship_to_last_name'   => $data['last_name'],

			'x_ship_to_address'     => $data['billing_address'],
			'x_ship_to_city'        => $data['billing_city'],
			'x_ship_to_state'       => $data['billing_state'],
			'x_ship_to_zip'         => $data['billing_zip'],
			'x_ship_to_country'     => 'United States',

			'x_cust_id'             => '',
			'x_phone'               => $data['phone'],
			'x_email'               => $data['email'],

 			'x_customer_ip'         => $_SERVER['REMOTE_ADDR'],

		);

		//debug($post_values);
		//die('end');

		App::uses('HttpSocket', 'Network/Http');
		$httpSocket = new HttpSocket();

		$response = $httpSocket->post($this->api_url, $post_values);

		if (!empty($response['body'])) {
			$parsed = preg_split("/,(?=(?:[^\"]*\"[^\"]*\")*(?![^\"]*\"))/", $response['body']);
			foreach ($parsed as $key => $value) {
				$parsed[$key] = substr($value, 1, -1);
			}
		} else {
			$parsed = array('-1', '-1', '-1');
		}
// pr($parsed);die();
		if($parsed[0] == '1') {
			return $parsed;
		} else {
		
			switch ($parsed[0]) {
			
			case '3':
			$error = '3';
				break;
				
			case '6':
			$error = '6';
				break;
				
			case '7':
				$error = '7';
				break;

			case '8':
				$error = '8';
				break;

			case '17':
			case '28':
				$error = '28';
				break;

			case '78':
				$error = '78';
				break;

			default:
				$error = $parsed[0];
				break;
			}
		}

		$this->log($parsed, 'authorizenet-errors');
		throw new Exception('Credit Card Processing Error: ' . $error);

	}

////////////////////////////////////////////////////////////

}

