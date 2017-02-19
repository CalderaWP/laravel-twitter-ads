<?php


namespace calderawp\twitter\ads\Providers;
use calderawp\twitter\ads\Connection;
use calderawp\twitter\ads\TailoredAudience;


/**
 * Class TailoredAudienceServiceProvider
 * @package calderawp\twitter\ads
 */
class TailoredAudienceServiceProvider  extends ServiceProvider{


	public function register()
	{
		$this->app->singleton( Connection::class, function () {
			return new TailoredAudience( PackageServiceProvider::getAPI() );
		} );
	}


	public function provides()
	{
		return [ TailoredAudience::class ];
	}

}