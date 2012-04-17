<?php

/**
 * Extend the class to be tested, providing access to protected elements
 *
 * @package login-security-solution
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2012
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPLv2
 */

/**
 * Obtain the parent class.
 * Use dirname(dirname()) because safe mode can disable "../".
 */
require_once dirname(dirname(__FILE__)) . '/login-security-solution.php';

/**
 * Get the admin class
 */
require_once dirname(dirname(__FILE__)) .  '/admin.inc';

// Remove automatically created object.
unset($GLOBALS['login_security_solution']);

/**
 * Extend the class to be tested, providing access to protected elements
 *
 * @package login-security-solution
 * @author Daniel Convissor <danielc@analysisandsolutions.com>
 * @copyright The Analysis and Solutions Company, 2012
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPLv2
 */
class Accessor extends login_security_solution_admin {
	/**
	 * Is this class being used by our unit tests?
	 * @var bool
	 */
	protected $testing = true;


	public function __call($method, $args) {
		return call_user_func_array(array($this, $method), $args);
	}
	public function __get($property) {
		return $this->$property;
	}
	public function __set($property, $value) {
		$this->$property = $value;
	}
	public function get_data_element($key) {
		return $this->data[$key];
	}
}
