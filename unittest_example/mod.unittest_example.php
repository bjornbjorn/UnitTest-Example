<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * UnitTest Example - nothing here, see the mcp.unittest_example.php for the goodies!
 *
 * @package		UnitTest
 * @subpackage	ThirdParty
 * @category	Modules
 * @author		Bjorn Borresen
 * @link		http://bybjorn.com/225
 */
class Unittest_example {	
		
	function Unittest_example() 
	{
		// Make a local reference to the ExpressionEngine super object
		$this->EE =& get_instance();
	}

	// this function should never become tripleString() sine soo much depends on it being doubleString!!
	function doubleString($str)
	{
		return $str.$str;
	}
	
	
}

/* End of file mod.unittest_example.php */ 
/* Location: ./system/expressionengine/third_party/unittest_example/mod.unittest_example.php */ 