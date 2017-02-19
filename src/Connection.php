<?php


namespace calderawp\twitter\ads;
use Hborras\TwitterAdsSDK\TwitterAds;


/**
 * Class Connection
 *
 * Base class for connecting to twitter ads accounts
 *
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

	/**
	 * Set the account property with instance of TwitterAds\Account
	 */
	protected function setAccount()
	{
		$this->account = $this->api->getAccounts($this->getAccountId() );

	}

	/**
	 * @return TwitterAds\Account
	 */
	protected function getAccount() : TwitterAds\Account
	{
		return $this->account;
	}

	/**
	 * @param string $accountId
	 */
	public function setAccountId( string $accountId )
	{
		$this->accountId = $accountId;
	}

	/**
	 * @return string
	 */
	protected function getAccountId() : string
	{
		return $this->accountId;
	}
}