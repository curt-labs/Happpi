<?

require('./Vehicle.php');

$Vehicle = new Vehicle;

var_dump($Vehicle->getVehiclesByPart(12289));
var_dump($Vehicle->getVehiclesByPart(12288));
?>

