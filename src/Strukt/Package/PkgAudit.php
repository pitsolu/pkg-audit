<?php

namespace Strukt\Package;

use Strukt\Contract\Package as Pkg;

class PkgAudit implements Pkg{

	private $manifest;

	public function __construct(){

		$this->manifest = array(

			"package"=>"pkg-audit",
			"files"=>array(


				"app/src/App/AuditModule/Controller/Authorship.sgf",
				"app/src/App/AuditModule/Controller/Log.sgf",
				"app/src/App/AuditModule/Controller/Ownership.sgf",
				"app/src/App/AuditModule/Controller/Revision.sgf",
				"app/src/App/AuditModule/Tests/AuthorshipTest.sgf",
				"app/src/App/AuditModule/Tests/LogTest.sgf",
				"app/src/App/AuditModule/Tests/OwnershipTest.sgf",
				"app/src/App/AuditModule/Tests/RevisionTest.sgf",
				"app/src/App/AuditModule/_AuditModule.sgf",
				"database/schema/Schema/Migration/VersionAudit.php",
				"lib/App/Middleware/Audit.php",
			),
			"modules"=>array(

				"AuditModule"
			)
		);
	}

	public function getName(){

		return $this->manifest["package"];
	}

	public function getFiles(){

		return $this->manifest["files"];
	}

	public function getModules(){

		return $this->manifest["modules"];
	}

	public function isInstalled(){

		return class_exists(\App\Middleware\Audit::class);		
	}
}