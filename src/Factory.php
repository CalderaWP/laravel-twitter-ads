<?php
/**
 * @TODO What this does
 *
 * @package ac2
 * Copyright 2017 Josh Pollock <Josh@CalderaWP.com
 */

namespace calderawp\twitter\ads;
use Hborras\TwitterAdsSDK\TwitterAds;


/**
 * Class Factory
 * @package calderawp\twitter\ads
 */
class Factory {


	public static function api() : TwitterAds
	{
		return new TwitterAds(
			config('twitter-adds.consumer-key'),
			config('twitter-adds.consumer-key-secret'),
			config('twitter-adds.access-key'),
			config('twitter-adds.access-key-secret')
		);
	}

}