<?php


namespace calderawp\twitter\ads;
use Hborras\TwitterAdsSDK\TwitterAds;


/**
 * Class Connection
 * @package calderawp\twitter\ads
 */
abstract  class Connection {

	/** @var TwitterAds  */
	protected $api;

	/** @var  string */
	private $accountId;

	/** @var  TwitterAds\Account */
	protected $account;

	public function __construct( TwitterAds $api, string $accountId = null )
	{
		$this->api = $api;
		if( $accountId ){
			$this->setAccountId( $accountId );
		}

	}

	protected function setAccount()
	{
		$this->account = $this->api->getAccounts($this->getAccountId() );

	}

	protected function getAccount() : TwitterAds\Account
	{
		return $this->account;
	}

	public function setAccountId( string $accountId )
	{
		$this->accountId = $accountId;
	}


	protected function getAccountId() : string
	{
		return $this->accountId;
	}
}