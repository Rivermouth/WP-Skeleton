<?php

if (!class_exists('SKLConfig')) {
	class SKLConfig
	{
		public $config = array(
			
			'default_lang' => 'en',
			
			'lang' => 'en',
			
			'text' => array(
				'en' => array(
					'read-more' => 'Read More',
					'404' => 'That page doesn\'t exists!<br>Please check the URL or try another page',
					'pagination-next' => 'Next',
					'pagination-prev' => 'Previous'
				),
				'fi' => array(
					'read-more' => 'Lue lisää',
					'404' => 'Sivua ei löydy!<br>Tarkista hakemasi sivun osoite tai siirry jollekin toiselle sivulle',
					'pagination-next' => 'Seuraavat',
					'pagination-prev' => 'Edelliset'
				)
			),
			
			'format' => array(
				'en' => array(
					'time' => 'F jS, Y'
				),
				'fi' => array(
					'time' => 'd.m.Y \k\l\o H.i' // 31.03.2014 klo 21.07
				)
			)
		);
	}
}

$GLOBALS['sklconf'] = new SKLConfig();

function skl($key=null, $val=null) 
{
	if ($key == null || $val == null) {
		return $GLOBALS['sklconf']->config;
	}
	$GLOBALS['sklconf']->config[$key] = $val;
}

?>