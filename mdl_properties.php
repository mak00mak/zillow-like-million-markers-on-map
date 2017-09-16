<?php
class Mdl_Properties extends MysqliDb
{
	private $db = null;
	public $page = 1;
	public $limit = 20;

	function __construct()
	{
		$this->db = MysqliDb::getInstance();
	}

	function getFilteredProperties($type = null, $bedrooms = null, $bathrooms = null, $cost = null, $columns = '*', $limit = 20)
	{
		if(!is_null($type)) {
			$this->db->where('property_type', $type);
		}
		if(!is_null($bedrooms)) {
			$this->db->where('bedrooms', $bedrooms);
		}
		if(!is_null($bathrooms)) {
			$this->db->where('bathrooms', $bathrooms);
		}
		if(!is_null($cost)) {
			$this->db->where('cost', $cost, 'BETWEEN');	// $cost = array(5000, 10000)
		}
		//$users = $this->db->get ("pro_property", $limit, $columns);
		$this->db->pageLimit = $this->limit;
		$properties = $this->db->withTotalCount()->arraybuilder()->paginate("pro_property", $this->page, $columns);
		return $properties;
	}

	function getFilteredPropertiesList($type = null, $bedrooms = null, $bathrooms = null, $cost = null, $columns = '*')
	{
		if(!is_null($type)) {
			$this->db->where('property_type', $type);
		}
		if(!is_null($bedrooms)) {
			$this->db->where('bedrooms', $bedrooms);
		}
		if(!is_null($bathrooms)) {
			$this->db->where('bathrooms', $bathrooms);
		}
		if(!is_null($cost)) {
			$this->db->where('cost', $cost, 'BETWEEN');	// $cost = array(5000, 10000)
		}
		//$users = $this->db->get ("pro_property", $limit, $columns);
		$this->db->pageLimit = 200000;
		$properties = $this->db->get("pro_property", null, $columns);
		return $properties;
	}

	function getDefaultImage($prop_id)
	{
		$this->db->where('property_id', $prop_id);
		$this->db->where('default_gallery', 'Yes');
		$image = $this->db->getValue  ("pro_gallery", "image_name");
		return $image;
	}
}