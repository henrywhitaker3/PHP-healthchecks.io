<?php

namespace Henrywhitaker3\Healthchecks;

class HttpClient
{
    /**
     * Perform a GET request against a specific URL
     *
     * @param String $url
     * @param array $headers Optional extra headers to send with request
     * @return array
     */
    public static function get(String $url, array $headers = [])
    {
        $curl = curl_init();
		$curlConfig = [
			CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPHEADER => $headers,
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

    /**
     * Perform a POST request against a specific URL
     *
     * @param String $url
     * @param array $headers Optional extra headers to send with request
     * @param array $data Optional data to send with request
     * @return array
     */
    public static function post(String $url, array $headers = [], array $data = [])
    {
        $curl = curl_init();
		$curlConfig = [
			CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data)
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

    /**
     * Perform a DELETE request against a specific URL
     *
     * @param String $url
     * @param array $headers Optional extra headers to send with request
     * @return array
     */
    public static function delete(String $url, array $headers = [])
    {
        $curl = curl_init();
		$curlConfig = [
			CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_CUSTOMREQUEST => 'DELETE'
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