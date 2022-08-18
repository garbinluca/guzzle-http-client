<?php

namespace GarbinLuca\GuzzleClient;

use GuzzleHttp\Exception\BadResponseException;
use PHPUnit\Framework\Assert as PHPUnit;

class ClientFake implements ClientInterface
{

	private $response = null;
	private $index = 0;

	public function __construct($responses) {

		$this->responses = $responses;

	}

	public function setHeaders(array $headers)
	{
	}

	public function parseResponse($response) {

		return (object) $response;

	}

	public function post(string $url, $params = [])
	{

		$response = $this->getResponse();

		$this->index++;

		return $this->parseResponse($response);

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

		$response = $this->getResponse();

		$this->index++;

		return $this->parseResponse($response);

	}

	private function getResponse() {


		if (is_array($this->responses) && $this->responses[$this->index])
			$response =  $this->responses[$this->index];
		else
			$response = ['code' => 200, 'success' => true, 'debug' => 'true'];

		if (array_key_exists('exception', $response))
			throw new \Exception($response['exception']);

		return $response;
	}
}
