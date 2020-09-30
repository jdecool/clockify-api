<?php

declare(strict_types=1);

namespace JDecool\Clockify;

use Http\Client\{
    Common\HttpMethodsClient,
    HttpClient,
};
use Http\Message\MessageFactory;
use Psr\Http\Message\RequestFactoryInterface;
use Http\Discovery\{
    Psr17FactoryDiscovery,
    Psr18ClientDiscovery,
};

class ClientBuilder
{
    private const ENDPOINT_V1 = 'https://api.clockify.me/api/v1/';

    private $httpClient;
    private $requestFactory;

    public function __construct(?HttpClient $httpClient = null, ?RequestFactoryInterface $requestFactory = null)
    {
        $this->httpClient = $httpClient ?? Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?? Psr17FactoryDiscovery::findRequestFactory();
    }

    public function createClientV1(string $apiKey): Client
    {
        return $this->create(self::ENDPOINT_V1, $apiKey);
    }

    public function create(string $endpoint, string $apiKey): Client
    {
        $http = new HttpMethodsClient($this->httpClient, $this->requestFactory);

        return new Client($http, $endpoint, $apiKey);
    }
}
