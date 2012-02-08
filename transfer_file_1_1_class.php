<?php

class TransferFile_1_1
{
	const QUOTATION = 1;
	const ORDER = 0;
	private $error;
	
	private $version;
	private $type;
	private $createdat;
	private $sentat;
	private $deliveryAt;
	private $title;
	private $sender;
	private $poReference;
	private $orderedBy;
	private $queriesContact;
	private $inTheNameOf;
	private $deliveryAddresses;
	
	
	private $languages;
	private $sources;
	private $targets;
	private $references;
	private $services;
	private $messages;
	
	public function TransferFile_1_1()
	{
		$this->version = "1.1";
		$this->type = TransferFile_1_1::QUOTATION;
		$this->createdat = null;
		$this->sentat = null;
		$this->title = null;
		$this->sender = null;
		$this->deliveryAt = null;
		$this->poReference = null;
		$this->orderedBy = null;
		$this->queriesContact = null;
		$this->inTheNameOf = null;
		$this->deliveryAddresses = null;
		
		$this->languages = array();
		$this->sources = array();
		$this->targets = array();
		$this->references = array();
		$this->services = array();
		$this->messages = array();
	}
	
	public function setVersion($version)
	{
		$this->version = $version;
	}
	
	public function getVersion()
	{
		return $this->version;
	}
	
	public function setType($type)
	{
		$this->type = $type;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function isQuotationQuery()
	{
		return $this->type == TransferFile_1_1::QUOTATION;
	}
	
	public function isOrderQuery()
	{
		return $this->type == TransferFile_1_1::ORDER;
	}
	
	public function setQuotationQuery()
	{
		$this->type = TransferFile_1_1::QUOTATION;
	}

	public function setOrderQuery()
	{
		$this->type = TransferFile_1_1::ORDER;
	}
	
	public function setCreatedAt($createdat)
	{
		$this->createdat = $createdat;
	}
	
	public function setSentAt($sentat)
	{
		$this->sentat = $sentat;
	}
	
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function setSender($sender)
	{
		$this->sender = $sender;
	}
	
	public function setDeliveryAt($deliveryAt)
	{
		$this->deliveryAt = $deliveryAt;
	}
	
	public function setPOReference($poReference)
	{
		$this->poReference = $poReference;
	}
	
	public function setOrderedBy($orderedBy)
	{
		$this->orderedBy = $orderedBy;
	}
	
	public function setQueriesContact($queriesContact)
	{
		$this->queriesContact = $queriesContact;
	}
	
	public function setInTheNameOf($name, $customerId)
	{
		$this->inTheNameOf = array(
			'name' => $name,
			'customerId' => $customerId		
		);
	}
	
	public function setDeliveryAddresses($deliveryAddresses)
	{
		$this->deliveryAddresses = $deliveryAddresses;
	}
	
	public function hasCombinationArray($combination)
	{
		foreach($this->languages as $comb) {
			
			if( $comb['from'] == $combination['from'] && $comb['to'] == $combination['to'] ) {
				return true;
			}
			
		}
		
		return false;
	}
	
	public function hasCombination($from, $to)
	{
		return $this->hasCombinationArray(array(
			'from' 	=> $from,
			'to' 	=> $to
		));
	}
	
	public function addCombination($from, $to)
	{
		$this->languages[] = array(
			'from' 	=> $from,
			'to' 	=> $to
		);
	}
	
	public function addSource($name, $md5)
	{
		$this->sources[] = array(
			'name'	=> $name,
			'md5'	=> $md5
		);
	}
	
	public function addTarget($name, $md5)
	{
		$this->targets[] = array(
			'name'	=> $name,
			'md5'	=> $md5
		);
	}
	
	public function addReference($name, $md5)
	{
		$this->references[] = array(
			'name'	=> $name,
			'md5'	=> $md5
		);
	}
	
	public function addService($code, $selected)
	{
		$this->services[] = array(
			'code' => $code,
			'selected' => $selected
		);
	}
	
	public function addMessage($from, $sentat, $body, $email=null)
	{
		$this->messages[] = array(
			'from'		=> $from,
			'sentat'	=> $sentat,
			'body'		=> $body,
			'email'		=> $email
		);
	}
	
	public function getCreatedAt()
	{
		return $this->createdat;
	}
	
	public function getSentAt()
	{
		return $this->sentat;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getSender()
	{
		return $this->sender;
	}
	
	public function getDeliveryAt()
	{
		return $this->deliveryAt;
	}
	
	public function getPOReference()
	{
		return $this->poReference;
	}
	
	public function getOrderedBy()
	{
		return $this->orderedBy;
	}
	
	public function getDeliveryAddresses()
	{
		return $this->deliveryAddresses;
	}
	
	public function hasQueriesContact()
	{
		return $this->queriesContact != null;
	}
	
	public function getQueriesContact()
	{
		return $this->queriesContact;
	}
	
	public function hasInTheNameOf()
	{
		return $this->getInTheNameOf() != null;
	}
	
	public function getInTheNameOf()
	{
		return $this->inTheNameOf;
	}
	
	public function getError()
	{
		return $this->error;
	}
	
	public function getLanguages()
	{
		return $this->languages;
	}
	
	public function getFrom($index)
	{
		return $this->languages[$index]['from'];
	}
	
	public function getTo($index)
	{
		return $this->languages[$index]['to'];
	}
	
	public function getToS() {
		$tos = array();
		foreach($this->languages as $combination) {
			$tos[] = $combination['to'];
		}
		return $tos;
	}
	
	public function addCombinationArray($combination)
	{
		$this->languages[] = $combination;
	}
	
	public function getSources()
	{
		return $this->sources;
	}
	
	public function isSource($filename) 
	{
		foreach($this->sources as $source) {
			if( $source['name'] == $filename )
				return true;
		}
		return false;
	}
	
	public function hasSources()
	{
		return count($this->sources) > 0;
	}
	
	public function getTargets()
	{
		return $this->targets;
	}
	
	public function getTargetsGroupBy()
	{
		$targets = array();
		
		foreach($this->getLanguages() as $combination) {
			$targets[$combination['to']] = array();
		}
		
		foreach($this->targets as $target)
		{
			if( preg_match("#_([a-zA-Z]{3})\.(.*)$#", $target['name'], $matches) ) {
				
				$iso = $matches[1];
				
				$targets[$iso][] = $target;
			}
		}
		
		return $targets;
	}
	
	public function hasTargets()
	{
		return count($this->targets) > 0;
	}
	
	
	public function isSourceFor($target, $testSource, $iso)
	{
	  $_target = "";
	  if( preg_match("#^(.*)_".$iso."\\.[a-zA-Z0-9]+$#", $target, $matches) ) {
	    $_target = $matches[1];
	  } else {
	    return false;
	  }
	  
	  $_source = "";
	  if( preg_match("#^(.*)\\.[a-zA-Z0-9]+$#", $testSource, $matches) ) {
	    $_source = $matches[1];
	  } else  {
	    return false;
	  }
	
	  return $_target == $_source;
	}
	
	public function getSourceFor($filename)
	{
	  $testName = "";
	  if( preg_match("#^(.*)\\.[a-zA-Z0-9]+$#", $filename, $matches) ) {
	    $testName = $matches[1];
	  }
	  foreach($this->getSources() as $source) {
	    
	    $sourceName = "";
	    if( preg_match("#^(.*)\\.[a-zA-Z0-9]+$", $filename, $matches) ) {
	      $sourceName = $matches[1];
	    }
	    
	    if( $sourceName == $testName ) {
	      return $source;
	    }
	    
	  }
	  return null;
	}
	
	public function getReferences()
	{
		return $this->references;
	}
	
	public function hasReferences()
	{
		return count($this->references) > 0;
	}
	
	public function getServices()
	{
		return $this->services;
	}
	
	public function hasServices()
	{
		return count($this->services) > 0;
	}
	
	public function hasSelectedServices()
	{
		foreach($this->services as $service)
		{
			if( $service['selected'] ) {
				return true;
			}
		}
		return false;
	}
	
	public function hasSelectedService($code)
	{
		foreach($this->services as $service)
		{
			if( $service['code'] == $code )
			{
				return $service['selected'];
			}
		}
		return false;
	}
	
	public function getMessages()
	{
		return $this->messages;
	}
	
	public function getLastMessage()
	{
		if( count($this->messages) > 0 ) 
			return $this->messages[count($this->messages)-1];
		else
			return null;
	}
	
	public function cdata($data)
	{
		return "<![CDATA[".$data."]]>";
	}
	
	public function toXML()
	{
		$dom = new DomDocument("1.0","utf-8");
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		
		
		$queryNode = $dom->createElement('query');
		$dom->appendChild($queryNode);
		
		$queryNode->setAttribute('version', $this->version);
		$queryNode->setAttribute('type', $this->type);
		
		$queryNode->appendChild($dom->createElement('createdat', $this->createdat));
		
		if( $this->sentat != null ) 
		{
			$queryNode->appendChild($dom->createElement('sentat', $this->sentat));
		}
		
		$queryNode->appendChild($dom->createElement('title', $this->cdata($this->title)));
		$queryNode->appendChild($dom->createElement('sender', $this->sender));
		
		if( $this->deliveryAt != null ) 
		{
			$queryNode->appendChild($dom->createElement('deliveryat', $this->deliveryAt));
		}
		
		if( $this->poReference != null ) 
		{
			$queryNode->appendChild($dom->createElement('poreference', $this->cdata($this->poReference)));
		}
		
		$queryNode->appendChild($dom->createElement('orderedby', $this->orderedBy));
		
		if( $this->queriesContact != null ) 
		{
			$queryNode->appendChild($dom->createElement('queriescontact', $this->queriesContact));
		}
		
		if( $this->inTheNameOf != null ) 
		{
			$queryNode->appendChild($this->inTheNameOfToXML($dom, $this->inTheNameOf));
		}
			
		
		if( $this->deliveryAddresses != null ) 
		{
			$queryNode->appendChild($dom->createElement('deliveryaddresses', $this->deliveryAddresses));
		}
		
		$languagesNode = $dom->createElement('languages');
		$queryNode->appendChild($languagesNode);
		
		foreach( $this->languages as $combination )
		{
			$languagesNode->appendChild($this->combinationToXML($dom, $combination));
		}
		
		$sourcesNode = $dom->createElement('sources');
		$queryNode->appendChild($sourcesNode);
		
		foreach( $this->sources as $file )
		{
			$sourcesNode->appendChild($this->fileToXML($dom, $file));
		}
		
		if( count($this->targets) > 0 )
		{
			$targetsNode = $dom->createElement('targets');
			$queryNode->appendChild($targetsNode);
		
			foreach( $this->targets as $file )
			{
				$targetsNode->appendChild($this->fileToXML($dom, $file));
			}
		}
		
		if( count($this->references) > 0 )
		{
			$referencesNode = $dom->createElement('references');
			$queryNode->appendChild($referencesNode);
		
			foreach( $this->references as $file )
			{
				$referencesNode->appendChild($this->fileToXML($dom, $file));
			}
		}
		
		
		$servicesNode = $dom->createElement('services');
		$queryNode->appendChild($servicesNode);
		foreach( $this->services as $service )
		{
			$servicesNode->appendChild($this->serviceToXML($dom, $service));
		}
		
		if( count($this->messages) )
		{
			$talkNode = $dom->createElement('talk');
			$queryNode->appendChild($talkNode);
			
			foreach( $this->messages as $message )
			{
				$talkNode->appendChild($this->messageToXML($dom, $message));
			}
		}
		
		$this->dom = $dom;
		
		return $dom->saveXML();
	}
	
	public function fileToXML($dom, $file)
	{
		$fileNode = $dom->createElement('file');
			
		$fileNode->appendChild($dom->createElement('name', $file['name']));
			
		if( isset($file['md5']) && $file['md5'] != null && $file['md5'] != '' )
		{
			$fileNode->setAttribute('md5', $file['md5']);
		}
		
		if( isset($file['size']) && $file['size'] != null && $file['size'] != '' ) {
			$fileNode->setAttribute('size', $file['size']);
		}
		
		if( isset($file['id']) && $file['id'] != null && $file['id'] != '' ) {
			$fileNode->setAttribute('id', $file['id']);
		}
		
		return $fileNode;
	}
	
	public function messageToXML($dom, $message)
	{
		$messageNode = $dom->createElement('message');
				
		$messageNode->appendChild($dom->createElement('from', $this->cdata($message['from'])));
			
		if( is_string($message['sentat']) ) 
		{
			$messageNode->appendChild($dom->createElement('sentat', ''));
		}
		else
		{
			$messageNode->appendChild($dom->createElement('sentat', date('Y-m-d H:i:s', $message['sentat'])));
		}
				
		$body = $dom->createElement('body');
		$body->appendChild($dom->createTextNode($this->cdata($message['body'])));
		
		$messageNode->appendChild($body);
		$messageNode->appendChild($dom->createElement('email', $message['email']));
		
		return $messageNode;
	}
	
	public function serviceToXML($dom, $service)
	{
		$serviceNode = $dom->createElement('service', $service['code']);
		$serviceNode->setAttribute('selected', ($service['selected']) ? '1' : '0');
		
		return $serviceNode;
	}
	
	public function combinationToXML($dom, $combination)
	{
		$combinationNode = $dom->createElement('combination');
			
		$combinationNode->appendChild($dom->createElement('from', $combination['from']));
		$combinationNode->appendChild($dom->createElement('to', $combination['to']));
		
		return $combinationNode;
	}
	
	public function inTheNameOfToXML($dom, $inTheNameIf)
	{
		$inTheNameOfNode = $dom->createElement('inthenameof');

		$inTheNameOfNode->appendChild($dom->createElement('name', $this->cdata($this->inTheNameOf['name'])));
		$inTheNameOfNode->appendChild($dom->createElement('customer', $this->inTheNameOf['customerId']));
		
		return $inTheNameOfNode;
	}
	
	public function saveToXMLFile($filename)
	{
		$this->toXML();
		$this->dom->save($filename);
	}
	
	public function parseFromXMLFile($filename)
	{
		$this->error = '';
		
		$dom = new DomDocument("1.0","utf-8");
		$dom->preserveWhiteSpace = false;
		$dom->load($filename);
		$dom->formatOutput = true;
		
		$root = $dom->documentElement;
		if( $root->nodeName != 'query' )
			return error('root node is not <query>');
		
		if( $root->hasAttribute('version') ) {
			$this->version = $root->getAttribute('version');
		}
		
		if( $root->hasAttribute('type') ) {
			$this->type = $root->getAttribute('type');
		} else {
			$this->type = TransferFile_1_1::QUOTATION;
		}
		
		if( $root->getElementsByTagName('createdat')->item(0) ) {
			$this->createdat = $root->getElementsByTagName('createdat')->item(0)->nodeValue;
		}
		
		if( $root->getElementsByTagName('sentat')->item(0) ) {
			$this->sentat = $root->getElementsByTagName('sentat')->item(0)->nodeValue;
		}
		
		$this->title = $root->getElementsByTagName('title')->item(0)->nodeValue;
		if( $root->getElementsByTagName('sender')->item(0))
		  $this->sender = $root->getElementsByTagName('sender')->item(0)->nodeValue;
		
		
		if( $root->getElementsByTagName('deliveryat')->item(0)) {
			$this->deliveryAt = $root->getElementsByTagName('deliveryat')->item(0)->nodeValue;
		}
		
		if( $root->getElementsByTagName('poreference')->item(0) ) {
			$this->poReference = $root->getElementsByTagName('poreference')->item(0)->nodeValue;
		}
		
		
		$this->orderedBy = $root->getElementsByTagName('orderedby')->item(0)->nodeValue;
		
		if( $root->getElementsByTagName('queriescontact')->item(0) ) {
			$this->queriesContact = $root->getElementsByTagName('queriescontact')->item(0)->nodeValue;
		}
		
		$inTheNameOfBlock = $root->getElementsByTagName('inthenameof')->item(0);
		if( $inTheNameOfBlock ) {
			$this->inTheNameOf = array(
				'name' => $inTheNameOfBlock->getElementsByTagName('name')->item(0)->nodeValue,
				'customerId' => $inTheNameOfBlock->getElementsByTagName('customer')->item(0)->nodeValue
			);
		}
		
		if( $root->getElementsByTagName('deliveryaddresses')->item(0) ) {
			$this->deliveryAddresses = $root->getElementsByTagName('deliveryaddresses')->item(0)->nodeValue;
		}
		
		
		$languages = $root->getElementsByTagName('combination');
		if( $languages )
		{
			foreach( $languages as $combination )
			{
				$this->languages[] = array(
					'from' => $combination->getElementsByTagName('from')->item(0)->nodeValue,
					'to' => $combination->getElementsByTagName('to')->item(0)->nodeValue
				);
			}
		}
		
		$sources = $root->getElementsByTagName('sources')->item(0);
		if( $sources )
		{
			foreach( $sources->getElementsByTagName('file') as $source )
			{
				$this->sources[] = $this->parseXMLFile($source);
			}
		}
		
		
		$targets = $root->getElementsByTagName('targets')->item(0);
		if( $targets )
		{
			foreach( $targets->getElementsByTagName('file') as $target )
			{
				$this->targets[] = $this->parseXMLFile($target);
			}
		}
		
		$referencesBlock = $root->getElementsByTagName('references')->item(0);
		if( $referencesBlock )
		{
			$references = $referencesBlock->getElementsByTagName('file');
			
			foreach( $references as $reference )
			{
				$this->references[] = $this->parseXMLFile($reference);
			}
		}
		
		$servicesBlock = $root->getElementsByTagName('services')->item(0);
		if( $servicesBlock )
		{
			$services = $servicesBlock->getElementsByTagName('service');
			
			foreach( $services as $service )
			{
				$this->services[] = $this->parseXMLService($service);
			}
		}
		
		$messages = $root->getElementsByTagName('talk')->item(0);
		if( $messages )
		{
			foreach( $messages->getElementsByTagName('message') as $message )
			{
				$messageXML = $this->parseXMLMessage($message);
				if( $messageXML != null )
				{
					$this->messages[] = $messageXML;
				}
			}
		}
		
		$this->dom = $dom;

		return true;
	}
	
	public function parseXMLFile($file)
	{
		
		if( $file->getElementsByTagName('name')->item(0) && $file->getElementsByTagName('md5')->item(0) )
		{
			return array(
				'name' => $file->getElementsByTagName('name')->item(0)->nodeValue,
				'md5' => $file->getElementsByTagName('md5')->item(0)->nodeValue,
				'size' => ($file->getElementsByTagName('size')->item(0)) ? $file->getElementsByTagName('size')->item(0)->nodeValue : ''
			);
		}
		else
		{
			return array(
				'name' => $file->nodeValue,
				'md5' => ($file->hasAttribute('md5')) ? $file->getAttribute('md5')  : null,
				'size' => ($file->hasAttribute('size')) ? $file->getAttribute('size') : null
			);
		}
	}
	
	public function parseXMLMessage($message)
	{
		if( $message->getElementsByTagName('from')->item(0) 
			&& $message->getElementsByTagName('sentat')->item(0)
			&& $message->getElementsByTagName('body')->item(0) )
		{
					
			return array(
				'from' => $message->getElementsByTagName('from')->item(0)->nodeValue,
				'sentat' => strtotime($message->getElementsByTagName('sentat')->item(0)->nodeValue),
				'body' => $message->getElementsByTagName('body')->item(0)->nodeValue,
				'email'	=> $message->getElementsByTagName('email')->item(0)->nodeValue
			);
		}
		
		return null;
	}
	
	public function parseXMLService($service)
	{
		if( $service->getElementsByTagName('code')->item(0) ) 
		{
			return array(
				'code' => $service->getElementsByTagName('code')->item(0)->nodeValue,
				'selected' => $service->hasAttribute('selected') && $service->getAttribute('selected') == 1
			);
		} 
		else 
		{
			 return array(
				'code' => $service->nodeValue,
				'selected' => $service->hasAttribute('selected') && $service->getAttribute('selected') == 1
			);
		}
	}
	
	private function error($error)
	{
		$this->error = $error;
		return false;
	}
}


?>