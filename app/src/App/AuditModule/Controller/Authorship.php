<?php

namespace __APP__\AuditModule\Controller;

class Authorship extends \Strukt\Contract\Controller{

	public function newEntry($token, $user_token){

		$em = $this->em();

		$em->getConnection()->beginTransaction();

		try{

			$author = $this->get("Authorship");
			$author->setToken($token);
			$author->setUserToken($user_token);
			$author->setCreatedAt(new \DateTime());

			$em->persist($author);
			$em->flush();

			$this->get("ad.ctr.Ownership")->newEntry($token, $user_token);

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