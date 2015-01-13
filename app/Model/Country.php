<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 */
class Country extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'iso';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}
