<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Unit Test Example
 *
 * @package		UnitTest
 * @subpackage	ThirdParty
 * @category	Modules
 * @author		Bjorn Borresen
 * @link		http://bybjorn.com/225
 */
class Unittest_example_mcp 
{
	var $base;			// the base url for this module			
	var $form_base;		// base url for forms
	var $module_name;	
	
	var $module_instance;

	function Unittest_example_mcp( $switch = TRUE )
	{		
		// normal EE stuff
		$this->EE =& get_instance();
		$this->module_name = strtolower(str_replace('_mcp', '', get_class($this)));
		$this->base	 	 = BASE.AMP.'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module='.$this->module_name;	

		// main navigation for this module
		$this->EE->cp->set_right_nav(array(
				'unittest_example_home'	=> $this->base,
				'unittests_that_fail'	=> $this->base.AMP.'method=fail',
			));	
							
		$this->EE->cp->set_breadcrumb($this->base, lang('unittest_example_module_name'));
		$this->EE->cp->set_variable('cp_page_title', "Running some unit tests, it's fun!" );			

		
		// We include the module to be able to run tests on it
		include PATH_THIRD."/unittest_example/mod.unittest_example.php";
		$this->module_instance = new Unittest_example();
	}
		
	function index() 
	{
		
		// load unit test library
		$this->EE->load->library('unit_test');
		$this->EE->unit->use_strict(TRUE);
		
		$this->EE->unit->run( $this->module_instance->doubleString("hello"), "hellohello", "doubleString returns the expected result" );
		
		// check that extensions are enabled for instance
		$this->EE->unit->run( $this->EE->config->item('allow_extensions'), 'y', 'are extensions enabled?' );

		$vars['report'] = $this->EE->unit->report();
		$vars['result'] = $this->EE->unit->result();
		
		return $this->EE->load->view('example', $vars, TRUE);
	}
	
	function fail()
	{
		$this->index();	// run the okey once first

		// big trailing slash of fail??
		$this->EE->unit->run( $this->EE->config->item('site_url'), $this->EE->config->slash_item('site_url'), "It does have a slash right?" );
							
		$this->EE->unit->run( $this->module_instance->doubleString("hello"), "hello", "doubleString will return the same string" );
		$this->EE->unit->run( 1, 2, '1 == 2, right?');
		$this->EE->unit->run( 1, 3, '1 == 3, right?');
						
		$vars['report'] = $this->EE->unit->report();
		$vars['result'] = $this->EE->unit->result();
		
		return $this->EE->load->view('example', $vars, TRUE);		
	}
	

	
}

/* End of file mcp.unittest_example.php */ 
/* Location: ./system/expressionengine/third_party/unittest_example/mcp.unittest_example.php */ 