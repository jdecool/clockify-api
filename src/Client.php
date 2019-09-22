<?php

declare(strict_types=1);

namespace JDecool\Clockify;

use Http\Client\Common\HttpMethodsClient;
use JDecool\Clockify\{
    Exception\ClockifyException,
    Exception\BadRequest,
    Exception\Forbidden,
    Exception\NotFound,
    Exception\Unauthorized
};
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class Client
{
    private $http;
    private $baseUri;
    private $apiKey;

    public function __construct(HttpMethodsClient $http, string $baseUri, string $apiKey)
    {
        if (false === filter_var($baseUri, FILTER_VALIDATE_URL)) {
            throw new RuntimeException('Invalid Clockify endpoint.');
        }

        $this->http = $http;
        $this->baseUri = $baseUri;
        $this->apiKey = $apiKey;
    }

    public function get(string $uri, array $params = []): array
    {
        $response = $this->http->get(
            $this->endpoint($uri, $params),
            ['X-Api-Key' => $this->apiKey]
        );

        if (200 !== $response->getStatusCode()) {
            throw $this->createExceptionFromResponse($response);
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    public function post(string $uri, array $data): array
    {
        $response = $this->http->post(
            $this->endpoint($uri),
            [
                'Content-Type' => 'application/json',
                'X-Api-Key' => $this->apiKey,
            ],
            json_encode($data)
        );

        if (201 !== $response->getStatusCode()) {
            throw $this->createExceptionFromResponse($response);
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    public function put(string $uri, array $data): array
    {
        $response = $this->http->put(
            $this->endpoint($uri),
            [
                'Content-Type' => 'application/json',
                'X-Api-Key' => $this->apiKey,
            ],
            json_encode($data)
        );

        if (!in_array($response->getStatusCode(), [200, 201], true)) {
            throw $this->createExceptionFromResponse($response);
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    public function patch(string $uri, array $data): array
    {
        $response = $this->http->patch(
            $this->endpoint($uri),
            [
                'Content-Type' => 'application/json',
                'X-Api-Key' => $this->apiKey,
            ],
            json_encode($data)
        );

        if (!in_array($response->getStatusCode(), [200, 204], true)) {
            throw $this->createExceptionFromResponse($response);
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    public function delete(string $uri): void
    {
        $response = $this->http->delete(
            $this->endpoint($uri)
        );

        if (204 !== $response->getStatusCode()) {
            throw $this->createExceptionFromResponse($response);
        }
    }

    private function endpoint(string $uri, array $params = []): string
    {
        $endpoint = sprintf(
            '%s/%s',
            rtrim($this->baseUri, '/'),
            ltrim($uri, '/')
        );

        if (!empty($params)) {
            $endpoint .= http_build_query($params);
        }

        return $endpoint;
    }

    private function createExceptionFromResponse(ResponseInterface $response): ClockifyException
    {
        $data = json_decode((string) $response->getBody(), true);
        $message = $data['message'] ?? '';
        $code = $data['code'] ?? 0;

        switch ($response->getStatusCode()) {
            case 400:
                return new BadRequest($message, $code);

            case 401:
                return new Unauthorized($message, $code);

            case 403:
                return new Forbidden($message, $code);

            case 404:
                return new NotFound($message, $code);
        }

        return new ClockifyException($message, $code);
    }
}
