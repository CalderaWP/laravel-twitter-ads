<?php


namespace calderawp\twitter\ads;
use Hborras\TwitterAdsSDK\TwitterAds;


/**
 * Class TailoredAudience
 * @package calderawp\twitter\ads
 */
class TailoredAudience extends Connection{
	/** @var  TwitterAds\TailoredAudience\TailoredAudienceMemberships */
	protected $tailoredAudienceMemberships;

	protected $members;

	/** @var  \DateTime */
	protected $effectiveDate;

	/** @var  \DateTime */
	protected $expiresDate;

	/**
	 * Add members by email
	 *
	 * @param array $emails Array of emails
	 * @param string $audienceName The name of tailored audience to add to.
	 */
	public function addMembers( array  $emails, string $audienceName )
	{
		foreach ( $emails as $email )
		{
			$this->members[] = $this->addMember( $email, $audienceName );
		}
	}

	/**
	 * Save tailored audience
	 *
	 * MUST set account ID and members first or Exceptions will be thrown
	 *
	 * @throws \Exception
	 * @return TwitterAds\Resource
	 */
	public function save()
	{
		if ( empty( $this->getAccountId() ) ) {
			throw new \Exception( 'Must set account ID on this object first' );

		}
		if( empty( $this->members ) ){
			throw new \Exception( 'No members set' );

		}
		$this->setTailoredMemberships();
		return $this->tailoredAudienceMemberships->save();
	}

	/**
	 * Set effective date for membership
	 *
	 * Use this before setting members if you dont' want it to be now
	 *
	 * @param \DateTime $effectiveDate
	 */
	public function setEffectiveDate( \DateTime $effectiveDate )
	{
		$this->effectiveDate = $effectiveDate;
	}

	/**
	 * Set expiration date for membership
	 *
	 * Use this before setting members if you dont' want it to be 24 hours from now
	 *
	 * @param \DateTime $expiresDate
	 */
	public function setExpiresDate( \DateTime $expiresDate )
	{
		$this->expiresDate = $expiresDate;
	}

	/**
	 * Set tailored audience object
	 */
	protected function setTailoredMemberships()
	{
		$this->tailoredAudienceMemberships = new TwitterAds\TailoredAudience\TailoredAudienceMemberships( $this->getAccount(), $this->members );

	}

	/**
	 * Add a member
	 *
	 * @param $email
	 * @param string $audienceName
	 *
	 * @return TwitterAds\TailoredAudience\TailoredAudienceMember
	 */
	protected function addMember( $email, string $audienceName )
	{
		$member = new TwitterAds\TailoredAudience\TailoredAudienceMember();
		$member->setUserIdentifier( $email );
		$member->setAdvertiserAccountId( $this->getAccountId() );
		$member->setUserIdentifierType('EMAIL');
		$member->setAudienceNames( [ $audienceName ] );
		$member->setEffectiveAt( $this->getEffectiveDate() );
		$member->setExpiresAt( $this->getExpiresDate() );

		return $member;
	}

	/**
	 * @return \DateTime
	 */
	public function getEffectiveDate() : \DateTime
	{
		if( empty( $this->effectiveDate ) ){
			$this->effectiveDate = new \DateTime( time() );
		}

		return $this->effectiveDate;
	}

	/**
	 * @return \DateTime
	 */
	public function getExpiresDate() : \DateTime
	{
		if( empty( $this->expiresDate ) ){
			$this->expiresDate = new \DateTime(  strtotime("+1 day") );
		}
	}




}