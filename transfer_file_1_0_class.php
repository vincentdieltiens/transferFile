<?php

class TransferFile_1_0
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
	private $deliveryAddresses;
	
	
	private $languages;
	private $sources;
	private $targets;
	private $references;
	private $services;
	private $messages;
	
	public function TransferFile_1_0()
	{
		$this->version = "1.0";
		$this->type = TransferFile_1_0::QUOTATION;
		$this->createdat = null;
		$this->sentat = null;
		$this->title = null;
		$this->sender = null;
		$this->deliveryAt = null;
		$this->poReference = null;
		$this->orderedBy = null;
		$this->queriesContact = null;
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
		return $this->type == TransferFile_1_0::QUOTATION;
	}
	
	public function isOrderQuery()
	{
		return $this->type == TransferFile_1_0::ORDER;
	}
	
	public function setQuotationQuery()
	{
		$this->type = TransferFile_1_0::QUOTATION;
	}
	
	public function setOrderQuery()
	{
		$this->type = TransferFile_1_0::ORDER;
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
	
	public function getQueriesContact()
	{
		return $this->queriesContact;
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
			$queryNode->appendChild($dom->createElement('sentat', $this->sentat));
		else
			$queryNode->appendChild($dom->createElement('sentat'));
		
		$queryNode->appendChild($dom->createElement('title', $this->title));
		$queryNode->appendChild($dom->createElement('sender', $this->sender));
		
		if( $this->deliveryAt != null )
			$queryNode->appendChild($dom->createElement('deliveryat', $this->deliveryAt));
		else
			$queryNode->appendChild($dom->createElement('deliveryat'));
			
		$queryNode->appendChild($dom->createElement('poreference', $this->poReference));
		$queryNode->appendChild($dom->createElement('orderedby', $this->orderedBy));
		$queryNode->appendChild($dom->createElement('queriescontact', $this->queriesContact));
		$queryNode->appendChild($dom->createElement('deliveryaddresses', $this->deliveryAddresses));
		
		$languagesNode = $dom->createElement('languages');
		$queryNode->appendChild($languagesNode);
		
		foreach( $this->languages as $combination )
		{
			$combinationNode = $dom->createElement('combination');
			$languagesNode->appendChild($combinationNode);
			
			$combinationNode->appendChild($dom->createElement('from', $combination['from']));
			$combinationNode->appendChild($dom->createElement('to', $combination['to']));
		}
		
		$sourcesNode = $dom->createElement('sources');
		$queryNode->appendChild($sourcesNode);
		
		foreach( $this->sources as $file )
		{
			
			$fileNode = $dom->createElement('file');
			$sourcesNode->appendChild($fileNode);
			
			$fileNode->appendChild($dom->createElement('name', $file['name']));
			$fileNode->appendChild($dom->createElement('md5', $file['md5']));
		}
		
		$targetsNode = $dom->createElement('targets');
		$queryNode->appendChild($targetsNode);
		
		foreach( $this->targets as $file )
		{
			$fileNode = $dom->createElement('file');
			$targetsNode->appendChild($fileNode);
			
			$fileNode->appendChild($dom->createElement('name', $file['name']));
			$fileNode->appendChild($dom->createElement('md5', $file['md5']));
		}
		
		$referencesNode = $dom->createElement('references');
		$queryNode->appendChild($referencesNode);
		
		foreach( $this->references as $file )
		{
			$fileNode = $dom->createElement('file');
			$referencesNode->appendChild($fileNode);
			
			$fileNode->appendChild($dom->createElement('name', $file['name']));
			$fileNode->appendChild($dom->createElement('md5', $file['md5']));
		}
		
		$servicesNode = $dom->createElement('services');
		$queryNode->appendChild($servicesNode);
		foreach( $this->services as $service )
		{
			$serviceNode = $dom->createElement('service', $service['code']);
			$servicesNode->appendChild($serviceNode);
			$serviceNode->setAttribute('selected', ($service['selected']) ? '1' : '0');
		}
		
		$talkNode = $dom->createElement('talk');
		$queryNode->appendChild($talkNode);
		
		foreach( $this->messages as $message )
		{
			$messageNode = $dom->createElement('message');
			$talkNode->appendChild($messageNode);
			
			$messageNode->appendChild($dom->createElement('from', $message['from']));
			if( is_string($message['sentat']) )
				$messageNode->appendChild($dom->createElement('sentat', ''));
			else
				$messageNode->appendChild($dom->createElement('sentat', date('Y-m-d H:i:s', $message['sentat'])));
			
			$body = $dom->createElement('body');
			$body->appendChild($dom->createTextNode($message['body']));
			$messageNode->appendChild($body);
			$messageNode->appendChild($dom->createElement('email', $message['email']));
		}
		
		$this->dom = $dom;
		
		return $dom->saveXML();
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
			$this->type = TransferFile_1_0::QUOTATION;
		}
			
		$this->createdat = $root->getElementsByTagName('createdat')->item(0)->nodeValue;
		$this->sentat = $root->getElementsByTagName('sentat')->item(0)->nodeValue;
		$this->title = $root->getElementsByTagName('title')->item(0)->nodeValue;
		if( $root->getElementsByTagName('sender')->item(0))
		  $this->sender = $root->getElementsByTagName('sender')->item(0)->nodeValue;
		
		
		if( $root->getElementsByTagName('deliveryat')->item(0)) {
			$this->deliveryAt = $root->getElementsByTagName('deliveryat')->item(0)->nodeValue;
		}
		
		$this->poReference = $root->getElementsByTagName('poreference')->item(0)->nodeValue;
		$this->orderedBy = $root->getElementsByTagName('orderedby')->item(0)->nodeValue;
		$this->queriesContact = $root->getElementsByTagName('queriescontact')->item(0)->nodeValue;
		$this->deliveryAddresses = $root->getElementsByTagName('deliveryaddresses')->item(0)->nodeValue;
		
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
				$this->sources[] = array(
					'name' => $source->getElementsByTagName('name')->item(0)->nodeValue,
					'md5' => $source->getElementsByTagName('md5')->item(0)->nodeValue
				);
			}
		}
		
		
		$targets = $root->getElementsByTagName('targets')->item(0);
		if( $targets )
		{
			foreach( $targets->getElementsByTagName('file') as $target )
			{
				$this->targets[] = array(
					'name' => $target->getElementsByTagName('name')->item(0)->nodeValue,
					'md5' => $target->getElementsByTagName('md5')->item(0)->nodeValue
				);
			}
		}
		
		$referencesBlock = $root->getElementsByTagName('references')->item(0);
		if( $referencesBlock )
		{
			$references = $referencesBlock->getElementsByTagName('file');
			
			foreach( $references as $reference )
			{
				$this->references[] = array(
					'name' => $reference->getElementsByTagName('name')->item(0)->nodeValue,
					'md5' => $reference->getElementsByTagName('md5')->item(0)->nodeValue
				);
			}
		}
		
		$servicesBlock = $root->getElementsByTagName('services')->item(0);
		if( $servicesBlock )
		{
			$services = $servicesBlock->getElementsByTagName('service');
			
			foreach( $services as $service )
			{
				if( $service->getElementsByTagName('code')->item(0) ) 
				{
					$this->services[] = array(
						'code' => $service->getElementsByTagName('code')->item(0)->nodeValue,
						'selected' => $service->hasAttribute('selected') && $service->getAttribute('selected') == 1
					);
				} 
				else 
				{
					$this->services[] = array(
						'code' => $service->nodeValue,
						'selected' => $service->hasAttribute('selected') && $service->getAttribute('selected') == 1
					);
				}
				
			}
		}
		
		$messages = $root->getElementsByTagName('talk')->item(0);
		if( $messages )
		{
			foreach( $messages->getElementsByTagName('message') as $message )
			{
				if( $message->getElementsByTagName('from')->item(0) 
				 && $message->getElementsByTagName('sentat')->item(0)
				 && $message->getElementsByTagName('body')->item(0) )
				{
					
					$this->messages[] = array(
						'from' => $message->getElementsByTagName('from')->item(0)->nodeValue,
						'sentat' => strtotime($message->getElementsByTagName('sentat')->item(0)->nodeValue),
						'body' => $message->getElementsByTagName('body')->item(0)->nodeValue,
						'email'	=> $message->getElementsByTagName('email')->item(0)->nodeValue
					);
				}
			}
		}
		
		$this->dom = $dom;

		return true;
	}
	
	private function error($error)
	{
		$this->error = $error;
		return false;
	}
}

?>