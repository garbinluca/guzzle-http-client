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

	public function parseResponse($response) {

        $response =  (object) json_decode($response->getBody(), true);
		return $response;

	}

	public function setHeaders($headers = [])
	{

		$this->client = new GuzzleHttpClient([
			'headers' => array_merge($this->defaultHeaders, $headers)
		]);

	}

	public function post($url, $params = [])
	{

		$response = $this->client->post($url, $params);
		return $this->parseResponse($response);

	}

	public function get(string $url)
	{

		$response = $this->client->get($url);
		return $this->parseResponse($response);

	}
}
