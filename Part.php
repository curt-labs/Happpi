<?php

include './helpers.php';
include './Configuration.php';

class Part{
	protected $config = null;
	protected $helper = null;

	private $partID = 0;
	private $custPartID = 0;
	private $status = 0;
	private $dateModified = "";
	private $dateAdded = "";
	private $shortDesc = "";
	private $oldPartNumber = "";
	private $listPrice = "";
	private $attributes = array(); // Array Attribute objects
	private $vehicleAttributes = array(); 
	// Array Attribute objects
	private $content = array(); // Array Attribute objects
	private $pricing = array(); // Array Attribute objects
	private $reviews = array(); // Array Review objects
	private $images = array(); // Array Image objects
	private $videos = array(); // Array Video objects
	private $pClass = array();
	private $relatedCount = 0;
	private $installTime = 0;
	private $averageReview = 0;
	private $drilling = "";
	private $exposed = "";
	private $vehicleID = 0;
	private $priceCode = 0;


	public function __construct($partID = 0, $custPartID = 0, $status = 0){
		$this->partID = $partID;
		$this->custPartID = $custPartID;
		$this->status = $status;

		$this->config = new Configuration;
		$this->helper = new Helper;
	}

	public function __destruct(){
		// Handle garbage cleanup
	}



	// Getters and Setters

	public function setPartID($partID)
	{
		if($partID != $this->partID){
			$this->partID = $partID;
		}
	}

	public function getPartID(){
		return $this->partID;
	}

	public function setCustPartID($custPartID)
	{
		if($custPartID != $this->custPartID){
			$this->custPartID = $custPartID;
		}
	}

	public function getCustPartID(){
		return $this->custPartID;
	}

	public function setStatus($status){
		if($status != $this->status){
			$this->status = $status;
		}

	}

	public function getStatus(){
		return $this->status;
	}
















	public function getRelatedParts() {
		$req = "";
		if($this->getPartID() > 0) {
			$req = $this->config->getDomain() . "GetRelatedParts";
			$req .= "?partID=" . $this->getPartID();
			if($this->config->getCustomerID() > 0){$req .= "&cust_id=" . $this->config->getCustomerID();}
			if($this->config->isIntegrated() == true){$req .= "&integrated=true";}
			$req .= "&dataType=" . $this->config->getDataType();
		}else{
			// partID was not assigned so there are no related parts
		}
		$resp = $this->helper->curlGet($req); // raw response
		$relatedParts_array = array(); // instaniate array of parts that are related	
		// step through the json and cast json objects to php objects
		foreach (json_decode($resp) as $obj) { 
			$p = $this->castToPart($obj); // cast json part objects to php part objects
			array_push($relatedParts_array, $p); // push part objects into relatedParts Array
		}
		return $relatedParts_array;
	}

	public function getPart(){
	$req = "";
	if($this->getPartID() > 0){
		$req = $this->config->getDomain() . "GetPart";
		$req .= "?partID=" . $this->getPartID();
		$req .= "&datatype=" . $this->config->getDataType();
	}else{

	}
	$resp = $this->helper->curlGet($req);
	return $this->castToPart(json_decode($resp));


	}



	private function castToPart($obj){
		$p = new Part();
		if(isset($obj->partID)){
			$p->partID = $obj->partID;
		}
		if(isset($obj->custPartID)){
			$p->custPartID = $obj->custPartID;
		}
		if(isset($obj->status)){
			$p->status = $obj->status;
		}
		if(isset($obj->dateModified)){
			$p->dateModified = $obj->dateModified;
		}
		if(isset($obj->dateAdded)){
			$p->dateAdded = $obj->dateAdded;
		}
		if(isset($obj->shortDesc)){
			$p->shortDesc = $obj->shortDesc;
		}
		if(isset($obj->oldPartNumber)){
			$p->oldPartNumber = $obj->oldPartNumber;
		}
		if(isset($obj->listPrice)){
			$p->listPrice = $obj->listPrice;
		}
		if(isset($obj->attributes)){
			$p->attributes = $obj->attributes;
		}
		if(isset($obj->vehicleAttributes)){
			$p->vehicleAttributes = $obj->vehicleAttributes;
		}
		if(isset($obj->content)){
			$p->content = $obj->content;
		}
		if(isset($obj->pricing)){
			$p->pricing = $obj->pricing;
		}
		if(isset($obj->reviews)){
			$p->reviews = $obj->reviews;
		}
		if(isset($obj->images)){
			$p->images = $obj->images;
		}
		if(isset($obj->videos)){
			$p->videos = $obj->videos;
		}
		if(isset($obj->pClass)){
			$p->pClass = $obj->pClass;
		}
		if(isset($obj->relatedCount)){
			$p->relatedCount = $obj->relatedCount;
		}
		if(isset($obj->installTime)){
			$p->installTime = $obj->installTime;
		}
		if(isset($obj->averageReview)){
			$p->averageReview = $obj->averageReview;
		}
		if(isset($obj->drilling)){
			$p->drilling = $obj->drilling;
		}
		if(isset($obj->exposed)){
			$p->exposed = $obj->exposed;
		}
		if(isset($obj->vehicleID)){
			$p->vehicleID = $obj->vehicleID;
		}
		if(isset($obj->priceCode)){
			$p->priceCode = $obj->priceCode;
		}
		return $p;
	}


}


?>