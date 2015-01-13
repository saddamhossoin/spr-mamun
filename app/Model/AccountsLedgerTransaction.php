<?php
App::uses('AppModel', 'Model');
/**
 * AccountsLedgerTransaction Model
 *
 */
class AccountsLedgerTransaction extends AppModel {


 public $belongsTo = array(
 		'AccountsHead' => array(
			'className' => 'AccountsHead',
			'foreignKey' => 'account_head_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CounterAccountsHead' => array(
			'className' => 'AccountsHead',
			'foreignKey' => 'counter_account_head_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

}
