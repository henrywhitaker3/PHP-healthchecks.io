<?php

namespace Henrywhitaker3\Healthchecks\Tests;

use Henrywhitaker3\Healthchecks\Exceptions\InvalidUrlException;
use Henrywhitaker3\Healthchecks\Healthchecks;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;

class InvalidUuidTest extends Test
{
    public function testInvalidUuid()
    {
        try {
            $hc = new Healthchecks('');
        } catch(InvalidUuidStringException $e) {
            $this->assertTrue(true);
            return true;
        }

        $this->assertTrue(false);
    }

    public function testInvalidUrl()
    {
        try {
            $uuid = Uuid::uuid4();
            $hc = new Healthchecks($uuid, 'test');
        } catch(InvalidUrlException $e) {
            $this->assertTrue(true);
            return true;
        }

        $this->assertTrue(false);
    }
}