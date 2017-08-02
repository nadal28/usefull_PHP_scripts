<?php

function paginateArray($array, $page, $itemsPerPage) {

	$totalPages = ceil(count($array) / $itemsPerPage);

	$page = $page > $totalPages ? $totalPages : $page;	//If the page requested is too higher then we show the highest available page
	$page = $page < 1 ? 1 : $page;						//If the requested page is below 1 then we show the first page
	$start = ($page - 1) * $itemsPerPage;

	return array_slice($array, $start, $itemsPerPage);
}
?>
