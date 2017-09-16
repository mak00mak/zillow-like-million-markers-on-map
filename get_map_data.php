<?php
$property_type = isset($_REQUEST['ptype']) ? $_REQUEST['ptype'] : null;
$bedrooms = isset($_REQUEST['bedrooms']) ? $_REQUEST['bedrooms'] : null;
$bathrooms = isset($_REQUEST['bathrooms']) ? $_REQUEST['bathrooms'] : null;
$min_cost = isset($_REQUEST['min_cost']) ? $_REQUEST['min_cost'] : null;
$max_cost = isset($_REQUEST['max_cost']) ? $_REQUEST['max_cost'] : null;
if(!is_null($min_cost) && !is_null($max_cost)) { $cost = array($min_cost, $max_cost); } else { $cost = null; }

$cols = array('property_id', 'property_title', 'cost', 'latitude', 'longitude');
$properties = $obj_prop->getFilteredPropertiesList($property_type, $bedrooms, $bathrooms, $cost, $cols);

echo json_encode($properties);