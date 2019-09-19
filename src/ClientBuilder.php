<?php

declare(strict_types=1);

namespace JDecool\Clockify;

use Http\Client\{
    Common\HttpMethodsClient,
    HttpClient
};
use Http\Message\MessageFactory;
use Http\Discovery\{
    HttpClientDiscovery,
    MessageFactoryDiscovery
};

class ClientBuilder
{
    private const ENDPOINT_V1 = 'https://api.clockify.me/api/v1/';

    private $httpClient;
    private $messageFactory;

    public function __construct(?HttpClient $httpClient = null, ?MessageFactory $messageFactory = null)
    {
        $this->httpClient = $httpClient ?? HttpClientDiscovery::find();
        $this->messageFactory = $messageFactory ?? MessageFactoryDiscovery::find();
    }

    public function createClientV1(string $apiKey): Client
    {
        return $this->create(self::ENDPOINT_V1, $apiKey);
    }

    public function create(string $endpoint, string $apiKey): Client
    {
        $http = new HttpMethodsClient($this->httpClient, $this->messageFactory);

        return new Client($http, $endpoint, $apiKey);
    }
}
