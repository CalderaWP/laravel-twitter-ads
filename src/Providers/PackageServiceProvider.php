<?php
namespace calderawp\twitter\ads\Providers;
use calderawp\twitter\ads\Factory;
use Hborras\TwitterAdsSDK\TwitterAds;
use Illuminate\Support\ServiceProvider;


/**
 * Class PackageServiceProvider
 * @package calderawp\twitter\ads
 */
class PackageServiceProvider extends ServiceProvider {

	/** @var  TwitterAds  */
	public static $api;
	protected $packageServices = [
		TailoredAudienceServiceProvider::class
	];

	public function boot()
	{
		$this->mergeConfigFrom(__DIR__.'/../config/twitter-ads.php', 'twitter-ads' );
		$this->publishes([
			__DIR__.'/../config/twitter-ads.php' => config_path('twitter-ads.php.php'),
		]);
	}

	public function register()
	{
		foreach ( $this->packageServices as $provider) {
			$this->app->registerDeferredProvider($provider);
		}
	}

	/**
	 * Get primary instance of API
	 *
	 * @return TwitterAds
	 */
	public static function getAPI() : TwitterAds
	{
		if(is_null( static::$api ) ){
			static::$api =  Factory::api();
		}

		return static::$api;
	}

}