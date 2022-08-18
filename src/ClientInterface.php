<?php

namespace GarbinLuca\GuzzleClient;

interface ClientInterface {

	public function setHeaders(array $headers);

	public function post(string $url, ?array $params);

	public function get(string $url);

	public function parseResponse($data);

}