<?php

namespace GarbinLuca\GuzzleClient;

use GuzzleHttp\Client as GuzzleHttpClient;

class Client implements ClientInterface
{

	private $client;

	private $defaultHeaders = [
		'Content-Type' => 'application/json'
	];

	public function __construct()
	{

		$this->client = new GuzzleHttpClient([
			"headers" => $this->defaultHeaders
		]);

	}

	private function parseResponse($response, $decode) {

		if ($decode)
			$response = json_decode($response, true);

		return $response;

	}

	public function setHeaders($headers = [])
	{

		$this->client = new GuzzleHttpClient([
			'headers' => array_merge($this->defaultHeaders, $headers)
		]);

	}

	public function post($url, $params = [], $decode = true)
	{

		$response = $this->client->post($url, $params);
		$this->response = $this->parseResponse($response->getBody(), $decode);
		return $response;

	}

	public function get(string $url, $decode = true)
	{

		$response = $this->client->get($url);
		$this->response = $this->parseResponse($response->getBody(), $decode);
		return $response;

	}
}
