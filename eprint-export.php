<?php
$data = array(
'entity_type' => 'person',
'items' => array(
array(
'rendered_val' => 'Smith, Smith',
'structured_val' => array(
'given_name' => 'Smith',
'family_name' => 'Smith'
),
'id' => ';alkdfjglkjhdslfkj',
'id_src' => 'mintymint',
'hints' => array(
'email' => array(
'smith@smith.org',
'smithy@smith.org'
),
'url' => array(
'http://smith.net'
)
)
),
array(
'rendered_val' => 'Spalding, Dave',
'structured_val' => array(
'given_name' => 'Dave',
'family_name' => 'Spalding'
),
'id' => 'foosmithbar',
'id_src' => 'mintymint',
'hints' => array(
'email' => array(
'dave@spalding.com',
),
'url' => array(
'http://spalding.net',
)
)
),
array(
'rendered_val' => 'Jones, Laura',
'structured_val' => array(
'given_name' => 'Laura',
'family_name' => 'Jones'
),
'id' => 'lskdjflskdjflskdjf',
'id_src' => 'mintymint',
'hints' => array(
'email' => array(
'laura@laurajones.net',
),
'url' => array(
'http://laurajones.net',
)
)
)
)
);



function send_data_eprints($f3,$fmldata)
{
	$ul = new SimpleXMLElement('<ul/>');
	foreach ($fmldata["items"] as $item)
	{
		$given_name = $item["structured_val"]["given_name"];
		$family_name = $item["structured_val"]["family_name"];
		$orcid = $item["id"];
		$li = $ul -> addChild('li');	
			$li -> addChild("span",$given_name.", ".$family_name." [".$orcid."]");

##adding the autofill data

		$fillul = $li -> addChild("ul");
		$fillli = $fillul -> addChild("li",$family_name);
			$fillli -> addAttribute('id', 'for:value:relative:_name_family');
			
		$fillli = $fillul -> addChild("li",$given_name);
			$fillli -> addAttribute('id', 'for:value:relative:_name_given');

		$fillli = $fillul -> addChild("li",$orcid);
                        $fillli -> addAttribute('id', 'for:value:relative:_id');


	}	

	

	header('Content-type: text/xml');
	$rtn = $ul->asXML();
	echo $rtn;
}

#	send_data_eprints($data,$data);

 


?>
