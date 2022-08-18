<?php

namespace GarbinLuca\GuzzleClient\Facades;

use GarbinLuca\GuzzleClient\ClientFake;
use Illuminate\Support\Facades\Facade;

class GuzzleClient extends Facade
{

	public static function fake($responses = null)
	{
		static::swap(new ClientFake($responses));
	}

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'guzzle-client';
    }
}
