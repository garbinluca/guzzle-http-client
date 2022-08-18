<?php namespace GarbinLuca\GuzzleClient;

class Response {

	private $data = null;

	public function __construct($data) {
		$this->data = $data;
	}

	public function getBody($decode = true) {

		$response = $this->data;

		if ($decode)
			$response = json_decode($this->data, true);

		return $response;

	}

}

