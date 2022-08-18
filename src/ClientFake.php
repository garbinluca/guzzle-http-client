<?php

namespace GarbinLuca\GuzzleClient;

use PHPUnit\Framework\Assert as PHPUnit;

class ClientFake implements ClientInterface
{

	private $response = null;

	public function __construct() {

	}

	public function setHeaders(array $headers)
	{
	}

	public function post(string $url, $params = [], $decode = true)
	{

		$response = ['success' => true];
		$this->response = $decode ? json_encode($response) : $response;
		return new Response($response);

	}

	public function assertResponse()
	{

		PHPUnit::assertTrue(
			$this->response != null,
			"The expected response is not null."
		);

	}

	public function get(string $url)
	{
		// TODO: Implement get() method.
	}
}
