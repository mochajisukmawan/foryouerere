<?php
require_once 'vendor/autoload.php';
use Phpml\Classification\KNearestNeighbors;
$samples=array(
	array(1,3),
	array(1,4),
	array(2,4),
	array(3,1),
	array(4,1),
	array(4,2)
);
$labels=array("a","a","a","b","b","b");
//$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
//$labels = ['a', 'a', 'a', 'b', 'b', 'b'];

$classifier = new KNearestNeighbors();
$classifier->train($samples, $labels);

echo $classifier->predict([3, 2]);
// return 'b'
?>