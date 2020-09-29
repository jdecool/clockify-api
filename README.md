Clockify API client
====================

[![Build Status](https://travis-ci.org/jdecool/clockify-api.svg?branch=master)](https://travis-ci.org/jdecool/clockify-api?branch=master)
[![Build Status](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Factions-badge.atrox.dev%2Fjdecool%2Fclockify-api%2Fbadge%3Fref%3Dmaster&style=flat)](https://actions-badge.atrox.dev/jdecool/clockify-api/goto?ref=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jdecool/clockify-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jdecool/clockify-api/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/jdecool/clockify-api/v/stable.png)](https://packagist.org/packages/jdecool/clockify-api)

PHP client for [Clockify.me API](https://clockify.me/developers-api).

## Install it

Install using [composer](https://getcomposer.org), with guzzle6-adapter:

```bash
composer require jdecool/clockify-api php-http/guzzle6-adapter
```

Install using [composer](https://getcomposer.org), with guzzle7-adapter:

```bash
composer require jdecool/clockify-api php-http/guzzle7-adapter
```

The library is decoupled from any HTTP message client with [HTTPlug](http://httplug.io). That's why you need to install a client implementation `http://httplug.io/` in this example.

## Getting started

### Use the HTTP client

```php
<?php

require __DIR__.'/vendor/autoload.php';

$builder = new JDecool\Clockify\ClientBuilder();
$client = $builder->createClientV1('your-clockify-api-key');

$workspaces = $client->get('workspaces');
```

### Use the decicated API client

```php
require __DIR__.'/vendor/autoload.php';

$builder = new JDecool\Clockify\ClientBuilder();
$client = $builder->createClientV1('your-clockify-api-key');

$apiFactory = new JDecool\Clockify\ApiFactory($client);
$workspaceApi = $apiFactory->workspaceApi();

$workspaces = $workspaceApi->workspaces(); // return an array of JDecool\Clockify\Model\WorkspaceDto
```

Available APIs:

* [Client](https://clockify.me/developers-api#tag-Client)
* [Project](https://clockify.me/developers-api#tag-Project)
* [Tag](https://clockify.me/developers-api#tag-Tag)
* [Task](https://clockify.me/developers-api#tag-Task)
* [Time entry](https://clockify.me/developers-api#tag-Time-entry)
* [User](https://clockify.me/developers-api#tag-User)
* [Workspace](https://clockify.me/developers-api#tag-Workspace)

## LICENSE

This library is licensed under the [MIT License](LICENSE).
