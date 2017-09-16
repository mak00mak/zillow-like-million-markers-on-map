<?php

// Print the element in readable format
function db($array, $title = 'DEBUG', $stop = false)
{
    echo "<br>########### $title  ################# <pre>";
    print_r($array);
    echo "<\/pre>##########################<br/>";
    if($stop) { die("Stopped from db()"); }
}

// Prepare the pagination stats array set
function get_pagination_stats($input)
{
    $total_records = isset($input['total_records']) ? $input['total_records'] : 0;
    $page_num = isset($input['page_num']) ? $input['page_num'] : 1;
    $per_page = isset($input['per_page']) ? $input['per_page'] : 20;
    if(!is_numeric($page_num) || $page_num <= 0) {
        $page_num = 1;
    }
    if(!is_numeric($per_page) || $per_page <= 0) {
        $per_page = 10;
    }
    if($page_num == 1)  $start_from = 0;
    else $start_from = (($page_num - 1) * $per_page);
  
    $total_pages = ceil($total_records / $per_page);
    $pagination = array(
        'total_records' => $total_records,
        'total_pages' => $total_pages,
        'prev_page' => ($page_num > 1) ? ($page_num - 1) : '',
        'page_num'  => $page_num,
        'next_page' => (empty($total_pages) || $total_pages == $page_num) ? '' : ($page_num  + 1),
        'start_from' => $start_from,
        'per_page'  => $per_page,
        );
    return $pagination;
}

// Get the thumbnail path
function getThumb($name)
{
	if(empty($name)) {
		$name = 'no_photo.jpg';
	}
	$url = "https://www.properbuz.com/gallery/thumbnail/{$name}";
	return $url;
}