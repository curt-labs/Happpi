<?php

//require('./Vehicle.php');
require('./LoadAll.php');

//$Vehicle = new Vehicle;
$Part = new Part();

//var_dump($Vehicle->getVehiclesByPart(12289));
//print_r($Vehicle->getYears());


//$Vehicle->setMount("front");

//foreach ($Vehicle->getYears() as $year){
//	echo $year;
//	print("<br />");
//}

$Part->setPartID(31500);

echo $Part->getPart()->getPartID();
echo "<br />";
echo $Part->getPartID() . " Related Parts:<ul>\n";
foreach($Part->getRelatedParts() as $part){
	echo("<li>" . $part->getPartID() . "</li>");
}
echo "\n</ul>"

?>

