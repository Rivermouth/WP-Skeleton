<?php

if (!class_exists('SKLConfig')) {
	class SKLConfig
	{
		public $config = array(
			
			'default_lang' => 'en',
			
			'lang' => 'en',
			
			'text' => array(
				'en' => array(
					'reply' => 'Reply',
					'send' => 'Send',
					'name' => 'Name',
					'email' => 'Email',
					'read-more' => 'Read More',
					'404' => 'That page doesn\'t exists!<br>Please check the URL or try another page',
					'pagination-next' => 'Next',
					'pagination-prev' => 'Previous',
                    'view-all-posts-in-%s' => 'View all posts in %s',
					'comment' => 'Comment',
					'comments' => 'Comments',
					'comments-are-closed' => 'Comments are closed',
					'leave-a-comment' => 'Leave a comment',
					'comment-waiting-moderation' => 'Your comment is awaiting moderation',
					'edit-comment' => 'Edit commment',
					'cancel-reply' => 'Cancel reply',
					'leave-a-reply-to-%s' => 'Leave a reply to %s',
				),
				'fi' => array(
					'reply' => 'Vastaa',
					'send' => 'Lähetä',
					'name' => 'Nimi',
					'email' => 'Sähköposti',
					'read-more' => 'Lue lisää',
					'404' => 'Sivua ei löydy!<br>Tarkista hakemasi sivun osoite tai siirry jollekin toiselle sivulle',
					'pagination-next' => 'Seuraavat',
					'pagination-prev' => 'Edelliset',
                    'view-all-posts-in-%s' => 'Katso kaikki %s -julkaisut',
					'comment' => 'Kommentti',
					'comments' => 'Kommentit',
					'comments-are-closed' => 'Kommentointi on suljettu',
					'leave-a-comment' => 'Kommentoi',
					'comment-waiting-moderation' => 'Kommenttisi odottaa hyväksyntää',
					'edit-comment' => 'Muokkaa kommenttia',
					'cancel-reply' => 'Peruuta vastaus',
					'leave-a-reply-to-%s' => 'Vastaa käyttäjälle %s',
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
		
		public function merge_config($conf)
		{
			$this->config = array_replace_recursive($this->config, $conf);
		}
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