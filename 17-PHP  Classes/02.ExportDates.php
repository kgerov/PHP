<?php
	//Print In Browser
	header( "content-type: application/xml; charset=UTF-8" );
	$xml = new DOMDocument( "1.0", "UTF-8" );
	$xml_year = $xml->createElement( "Year",  "2014");
	$xml_month = $xml->createElement( "Month", "January" );
	$xml_day = $xml->createElement( "Day", "21st" );

	$xml_month->appendChild( $xml_day );
	$xml_year->appendChild( $xml_month );

	$xml_month = $xml->createElement( "Month", "April" );
	$xml_year->appendChild( $xml_month );

	$xml_month = $xml->createElement( "Month", "December" );
	$xml_day = $xml->createElement( "Day", "1st" );
	$xml_month->appendChild( $xml_day );
	$xml_year->appendChild( $xml_month );

	$xml->appendChild( $xml_year );

	print $xml->saveXML();

	//WRITE IN FILE
	$writer = new XMLWriter();  
	$writer->openURI('dates.xml');  
	$writer->startDocument('1.0','UTF-8');  
	$writer->setIndent(4);   
	$writer->startElement('Year');
	$writer->writeAttribute('value', '2014');
		$writer->startElement('Month');
		$writer->writeAttribute('value', 'January');
			$writer->startElement('Day');
			$writer->writeAttribute('value', '21st');
			$writer->endElement();
		$writer->endElement();
		$writer->startElement('Month');
		$writer->writeAttribute('value', 'April');
		$writer->endElement();
		$writer->startElement('Month');
		$writer->writeAttribute('value', 'December');
			$writer->startElement('Day');
			$writer->writeAttribute('value', '1st');  
			$writer->endElement();
		$writer->endElement();
	$writer->endElement();
	$writer->endDocument();
	$writer->flush();


?>