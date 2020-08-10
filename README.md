# PHP-healthchecks.io

This package provides simple methods to interact with the [healthchecks.io](https://healthchecks.io) API.

## Installation

need to update once live

## Usage

This package provides two classes you can use:

### Healthchecks

This class is just used to update a healthchecks.io endpoint.

To create a new instance, you need to pass the UUID for the endpoint you want to update:

```php
$hc = new Healthchecks('SAMPLE-UUID-HERE');
```

Once you have your created a new instance, there are 3 methods to use:

```php
$hc->success(); // sends a 'success' signal
$hc->fail(); // sends a 'fail' signal
$hc->start(); // sends a 'start' signal
```

### HealthchecksManager

This class can be used to interact with the healthchecks.io management API. Creating a new instance is simple:

```php
$hm = new HealthchecksManager('SAMPLE-API-KEY');
```

You now have several methods you can use:

```php
$hm->listChecks(); // lists all checks
$hm->getCheck('UUID'); // get info for a specific check
$hm->pauseCheck('UUID'); // pauses a check
$hm->resumeCheck('UUID'); // pings a check to resume it
$hm->deleteCheck('UUID'); // deletes the check
$hm->getCheckPings('UUID'); // gets a list of pings for the check
$hm->getCheckStatusChanges('UUID'); // returns a list of "flips" this check has experienced
$hm->createCheck($args); // create a new check
$hm->createCheck($args); // create a new check
$hm->integrations($args); // get a list of integrations (i.e. slack, discord etc.)
```

## Contributing

Contributions are welcome, but please write tests for whatever you add. Create a new file in the `tests/tests` directory with the following structure:

```php
<?php

namespace Henrywhitaker3\Healthchecks\Tests;

class NewTest extends Test
{
    //
}
```

As these tests will need valid credentials and a UUID, you will need to setup a `.env` file to run tests successfully. Simply copy the `.env.example` to `.env` and fill in the relevant details.