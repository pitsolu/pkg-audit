<?php

namespace __APP__\AuditModule\Tests;

use App\Contract\AbstractTestCase;
use Ramsey\Uuid\Uuid;

class LogTest extends AbstractTestCase{

	public function testLogAdd(){

		$token = Uuid::uuid4();
		$user_token = Uuid::uuid4();

		$user_details = array(

			"first_name"=>"Keanu",
			"last_name"=>"Reeves"
		);

		$entry = $this->get("ad.ctr.Log")->add($token->toString(), 
													$user_details, 
													$user_token->toString());

		$this->assertNotNull($entry);

		return $token;
	}
}