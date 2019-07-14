<?php

namespace __APP__\AuditModule\Controller;

class Log extends \Strukt\Contract\Controller{

	public function changeOwner($token, $user_token){

		$this->get("ad.ctr.Ownership")->changeEntry($token, $user_token);

		$this->add($token, array(), $user_token);
	}

	public function updateRecord($token, $data, $user_token){

		$this->get("ad.ctr.Revision")->newEntry($token, $user_token);

		$this->add($token, $data, $user_token);
	}

	public function newRecord($token, $data, $user_token){

		$this->get("ad.ctr.Authorship")->newEntry($token, $user_token);

		$this->add($token, $data, $user_token);
	}

	public function findByToken($token){

		return $this->da()->repo("Log")->findBy(array(

			"token"=>$token
		));
	}

	public function add($token, $data, $user_token){

		$em = $this->em();

		$em->getConnection()->beginTransaction();

		try{

			$log = $this->get("Log");
			$log->setToken($token);
			$log->setData(json_encode($data));
			$log->setUserToken($user_token);
			$log->setCreatedAt(new \DateTime());

			$em->persist($log);
			$em->flush();

			$em->getConnection()->commit();

			return $log;
		}
		catch(\Exception $e){

			$em->getConnection()->rollBack();

			$this->core()->get("app.logger")->error($e->getMessage());

			return null;
		}
	}
}