<?php


namespace calderawp\twitter\ads;
use Hborras\TwitterAdsSDK\TwitterAds;


/**
 * Class Factory
 * @package calderawp\twitter\ads
 */
class Factory {

	/**
	 * Create Twitter Ads API from config
	 *
	 * @return TwitterAds
	 */
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