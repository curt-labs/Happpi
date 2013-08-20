<?php
    require_once('LoadAll.php'); // points to the LoadAll.php file for loading the library.
 
    // Once the library is required, you can now use one of the main "interaction" classes.
    // These interaction classes contain methods that get information from our REST API and
    // converts them to PHP objects for you to use.
    $vehicle = new CurtVehicle(); // create new vehicle object to gain access to its functions.
 
    $vehicle->setMount("rear"); // set optional "dependency" of mount.
    $vehicle->setYear(2010); // set dependency of year.
    $vehicle->setMake("Ford"); // set dependency of make.
    $vehicle->setModel("F-150"); // set dependency of model.
    $vehicle->setStyle("Except with Factory Equipped Hitch"); // set dependency of style.
    $myVehicle = $vehicle->getVehicle(); // call getVehicle which returns a CurtVehicle object.
 
    echo "<h2>Electrical Connectors for Vehicle ID: " . $myVehicle->getVehicleID() .  "</h2>";// get the vehicleID showing a new CurVehicle object was returned.
     
    $connectorsForMyVehicle = $myVehicle->getConnector(); // call getParts which returns a list of parts for the vehicle.
    foreach($connectorsForMyVehicle as $connnector){ // step through the list of parts
        echo $connnector->getShortDesc(); //display the short description for each part.
        echo "<br />";
    }
?>