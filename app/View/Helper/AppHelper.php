<?php 
/**
 * Application level View Helper
 *
 * This file is application-wide helper file.
 *
 * @package       app.View.Helper
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
    function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }
}
?> 