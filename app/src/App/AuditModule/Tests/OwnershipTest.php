<?php

namespace __APP__\AuditModule\Tests;

use App\Contract\AbstractTestCase;
use Ramsey\Uuid\Uuid;

class OwnershipTest extends AbstractTestCase{

	public function testNewEntry(){

		$token = Uuid::uuid4();
		$user_token = Uuid::uuid4();

		$is_saved = $this->get("ad.ctr.Ownership")->newEntry($token, $user_token);

		$this->assertTrue($is_saved);

		return $token;
	}	

	/**
	* @depends testNewEntry
	*/
	public function testChangeEntry($token){

		$new_user_token = Uuid::uuid4();

		$is_saved = $this->get("ad.ctr.Ownership")->changeEntry($token, $new_user_token);

		$this->assertTrue($is_saved);
	}
}