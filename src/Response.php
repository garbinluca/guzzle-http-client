<?php namespace GarbinLuca\GuzzleClient;

class Response {

	private $data = null;

	public function __construct($data) {
		$this->data = $data;
	}

	public function getBody() {

		return $this->data;

	}

}

