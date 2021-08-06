<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Views_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	// CREATE GERALZÃO
	public function create($table=NULL, $data=array())
	{
		return $this->db->insert($table, $data);
	}

	// READ GERALZÃO
	public function get($a=array(), $row=FALSE)
	{
		$b = array(
			'select' => '*',
			'from' => NULL,
			'where' => 'id IS NOT NULL',
			'orderby' => 'id'
		);
		$argv = array_merge($b, $a);
		
		$this->db->select($argv['select'])
		->from($argv['from'])
		->where($argv['where'])
		->order_by($argv['orderby']);
		
		$query = $this->db->get();
		return $row ? $query->row_array() : $query->result_array();
	}

	// UPDATE GERALZÃO
	public function update($argv=array())
	{
		$this->db->where($argv['where']);
		return $this->db->update($argv['table'], $argv['data']);
	}

	// READ HEADER'S METAS
	public function get_header_metas($view)
	{
		$default = array(
			'application_name' => '',
			'author' => '',
			'description' => '',
			'keywords' => '',
			'robots' => '',
			'title' => 'Erro 404'
		);

		$query = $this->db->get_where('headers', array('view' => $view));
		return is_null($query->row_array()) ? $default : $query->row_array();
	}

	// READ MENU'S ITEMS
	public function get_menu_items($menu)
	{
		$default = array(
			array(
				'id' => 0,
				'parent_id' => NULL,
				'dropdown' => FALSE,
				'pos' => 'left',
				'title' => 'Link',
				'href' => '',
				'external' => 0,
				'modal' => 0,
				'icon' => 'fa fa-unlink'
			)
		);
		
		$this->db->from('menus')
		->where(array('menu' => $menu, 'active' => TRUE))
		->where_in('access', array('both', (isset($_SESSION['user']) ? 'user' : 'guest')))
		->order_by('rank asc');

		$query = $this->db->get();
		return empty($query->result_array()) ? $default : $query->result_array();
	}

}
