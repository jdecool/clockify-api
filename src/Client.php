<?php

declare(strict_types=1);

namespace JDecool\Clockify;

use Http\Client\Common\HttpMethodsClient;
use JDecool\Clockify\{
    Exception\ClockifyException,
    Exception\BadRequest,
    Exception\Forbidden,
    Exception\NotFound,
    Exception\Unauthorized,
};
use Psr\Http\Message\ResponseInterface;

class Client
{
    private $http;

    public function __construct(HttpMethodsClient $http)
    {
        $this->http = $http;
    }

    public function get(string $uri, array $params = []): array
    {
        if (!empty($params)) {
            $uri .= '?'.http_build_query($params);
        }

        $response = $this->http->get($uri);

        if (200 !== $response->getStatusCode()) {
            throw $this->createExceptionFromResponse($response);
        }

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function post(string $uri, array $data): array
    {
        $response = $this->http->post($uri, [], json_encode($data, JSON_THROW_ON_ERROR));

        if (201 !== $response->getStatusCode()) {
            throw $this->createExceptionFromResponse($response);
        }

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function put(string $uri, array $data): array
    {
        $response = $this->http->put($uri, [], json_encode($data, JSON_THROW_ON_ERROR));

        if (!in_array($response->getStatusCode(), [200, 201], true)) {
            throw $this->createExceptionFromResponse($response);
        }

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function patch(string $uri, array $data): array
    {
        $response = $this->http->patch($uri, [], json_encode($data, JSON_THROW_ON_ERROR));

        if (!in_array($response->getStatusCode(), [200, 204], true)) {
            throw $this->createExceptionFromResponse($response);
        }

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function delete(string $uri): void
    {
        $response = $this->http->delete($uri);

        if (204 !== $response->getStatusCode()) {
            throw $this->createExceptionFromResponse($response);
        }
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
