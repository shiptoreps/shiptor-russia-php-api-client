<?php
namespace ShiptorRussiaApiClient\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\BadResponseException;

class Request
{
    private $apiUrl = '';
    protected $apiKey = '';
    protected $guzzlePlugins = array();
    private $client;
    /**
     * @param string $apiKey
     * @param string $apiUrl
     * @throws Exception\EmptyApiKeyException
     */
    public function __construct($apiKey, $apiUrl = '')
    {
        if (empty($apiKey)) {
            throw new Exception\EmptyApiKeyException();
        }
        $this->apiKey = $apiKey;
        if (!empty($apiUrl)) {
            $this->apiUrl = $apiUrl;
        }
        $this->client = new GuzzleClient();
    }

    /**
     * @param $method
     * @param array $params
     * @param int $id
     * @throws \Exception
     * @internal param array $data
     * @return array|bool|float|int|string
     */
    public function call($method, $params = array(), $id = 1)
    {
        $headers = array(
            'x-authorization-token' => $this->apiKey,
            'content-type' => 'application/json'
        );
        $request = array(
            'jsonrpc' => '2.0',
            'method' => $method,
            'params' => $params,
            'id' => $id
        );
        try {
            $request = $this->client->post($this->apiUrl, [
                'headers' => $headers,
                'body' => json_encode($request),
            ]);
            $response = $request->json();
        } catch (BadResponseException $exception) {
            $response = $exception->getResponse()->json();
        }

        return $response;
    }
}