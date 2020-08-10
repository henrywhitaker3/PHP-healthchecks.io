<?php

namespace Henrywhitaker3\Healthchecks;

use Henrywhitaker3\Healthchecks\Exceptions\HealthChecksFailureException;
use Henrywhitaker3\Healthchecks\Exceptions\HealthchecksUuidNotFoundException;
use Henrywhitaker3\Healthchecks\Exceptions\InvalidUrlException;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;

class Healthchecks
{
	/**
     * UUID for healthcheks
     *
     * @var string
     */
    public $uuid;

    /**
     * URL for healthcheks instance
     *
     * @var string
     */
    public $url;

    /**
     * Constructor for healthchecks class
     *
     * @param String $uuid
     * @param String $url
     */
    public function __construct(String $uuid, String $url = 'https://hc-ping.com/')
    {
        $this->uuid = $uuid;
        $this->url = $url;

        $this->validate();
	}
	
	/**
     * Validate the args supplied in the constructor
     *
     * @return void
     */
    public function validate()
    {
        if(substr($this->url, -1) != '/') {
            $this->url = $this->url . '/';
		}
		
		if (filter_var($this->url, FILTER_VALIDATE_URL) == false) {
			throw new InvalidUrlException();
		}

        if(Uuid::isValid($this->uuid) !== true) {
            throw new InvalidUuidStringException();
        }
	}
	
	/**
     * Send a 'success' signal
     *
     * @return boolean
     */
    public function success()
    {
		$url = $this->url . $this->uuid;

		$resp = $this->get($url);
		
        if($resp['status'] !== 200) {
            if($resp['status'] == 404) {
                throw new HealthchecksUuidNotFoundException();
            }

            throw new HealthChecksFailureException();
        }

        return true;
	}
	
	/**
     * Send a 'fail' signal
     *
     * @return boolean
     */
    public function fail()
    {
		$url = $this->url . $this->uuid . '/fail';

		$resp = $this->get($url);
		
        if($resp['status'] !== 200) {
            if($resp['status'] == 404) {
                throw new HealthchecksUuidNotFoundException();
            }

            throw new HealthChecksFailureException();
        }

        return true;
	}

	/**
     * Send a 'start' signal
     *
     * @return boolean
     */
    public function start()
    {
		$url = $this->url . $this->uuid . '/start';

		$resp = $this->get($url);
		
        if($resp['status'] !== 200) {
            if($resp['status'] == 404) {
                throw new HealthchecksUuidNotFoundException();
            }

            throw new HealthChecksFailureException();
        }

        return true;
	}
	
	/**
	 * Simple GET cURL command
	 *
	 * @param String $url
	 * @return array
	 */
	public function get(String $url)
	{
		$curl = curl_init();
		$curlConfig = [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
		];
		curl_setopt_array($curl, $curlConfig);

		$response = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		curl_close($curl);

		return [
			'body' => $response,
			'status' => $status,
		];
	}
}
