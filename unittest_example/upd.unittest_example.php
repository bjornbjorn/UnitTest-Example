<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Installer for UnitTest Example module
 *
 * @package		UnitTest
 * @subpackage	ThirdParty
 * @category	Modules
 * @author		Bjorn Borresen
 * @link		http://bybjorn.com/225
 */
class Unittest_example_upd {
		
	var $version        = '1.0'; 
	var $module_name = "Unittest_example";
	
    function Unittest_example_upd( $switch = TRUE ) 
    { 
		// Make a local reference to the ExpressionEngine super object
		$this->EE =& get_instance();
    } 

    /**
     * Installer for the Rating module
     */
    function install() 
	{				
						
		$data = array(
			'module_name' 	 => 'Unittest_example',
			'module_version' => $this->version,
			'has_cp_backend' => 'y'
		);

		$this->EE->db->insert('modules', $data);		
																
		return TRUE;
	}


	function uninstall() 
	{ 				
		$this->EE->load->dbforge();
		
		$this->EE->db->select('module_id');
		$query = $this->EE->db->get_where('modules', array('module_name' => $this->module_name));
		
		$this->EE->db->where('module_id', $query->row('module_id'));
		$this->EE->db->delete('module_member_groups');
		
		$this->EE->db->where('module_name', $this->module_name);
		$this->EE->db->delete('modules');
		
		$this->EE->db->where('class', $this->module_name);
		$this->EE->db->delete('actions');
		
		$this->EE->db->where('class', $this->module_name.'_mcp');
		$this->EE->db->delete('actions');
		
		return TRUE;
	}
	
	function update($current = '')
	{
		return FALSE;
	}
    
}

/* End of file upd.rating.php */ 
/* Location: ./system/expressionengine/third_party/unittest_example/upd.unittest_example.php */ 