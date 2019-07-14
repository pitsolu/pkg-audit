<?php

namespace App\Middleware;

use Strukt\Http\Response;
use Strukt\Http\Request;
use Strukt\Contract\MiddlewareInterface;
use Strukt\Contract\AbstractMiddleware;

class Audit extends AbstractMiddleware implements MiddlewareInterface{

	public function __invoke(Request $request, Response $response, callable $next){

		$core = $this->core()->get("core");

		$logger = $core->getNew("ad.ctr.Log");

		parse_str($request->getContent(), $content);

		if(is_array($content)){

			$content = json_encode($content);
		}

		$token = $request->getRequestUri();
		$userToken = $request->getUser()->getToken();

		if($request->isMethod("PUT")){

			$logger->updateRecord($token, $content, $userToken);			
		}
		elseif($request->isMethod("POST")){

			$logger->newRecord($token, $content, $userToken);
		}

		return $next($request, $response);
	}
}