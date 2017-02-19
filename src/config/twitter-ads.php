<?php
return [
	'consumer-key' => env('TWITTER_ADS_CONSUMER_KEY', env( 'TWITTER_KEY' ) ),
	'consumer-key-secret' => env('TWITTER_ADS_CONSUMER_KEY_SECRET', env( 'TWITTER_SECRET' )),
	'access-key' => env('TWITTER_ADS_ACCESS_KEY'),
	'access-key-secret' => env('TWITTER_ADS_ACCESS_KEY_SECRET'),
];