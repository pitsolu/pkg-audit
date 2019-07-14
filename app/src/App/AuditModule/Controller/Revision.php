<?php

namespace __APP__\AuditModule\Controller;

class Revision extends \Strukt\Contract\Controller{

	public function newEntry($token, $user_token){

		$em = $this->em();

		$em->getConnection()->beginTransaction();

		try{

			$rev = $this->get("Revision");
			$rev->setToken($token);
			$rev->setUserToken($user_token);
			$rev->setCreatedAt(new \DateTime());

			$em->persist($rev);
			$em->flush();

			$em->getConnection()->commit();

			return true;
		}
		catch(\Exception $e){

			$em->getConnection()->rollBack();

			$this->core()->get("app.logger")->error($e->getMessage());

			return false;
		}
	}
}