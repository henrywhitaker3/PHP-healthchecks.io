<?php

namespace Henrywhitaker3\Healthchecks\Tests;

use Henrywhitaker3\Healthchecks\Exceptions\HealthchecksUuidNotFoundException;
use Henrywhitaker3\Healthchecks\HealthchecksManager;
use Ramsey\Uuid\Uuid;

class GetCheckTest extends Test
{
    /**
     * Tests listing specific check form API
     *
     * @return void
     */
    public function testValidUuid()
    {
        $hc = new HealthchecksManager($_ENV['APIKEY']);

        $check = $hc->getCheck($_ENV['UUID']);

        $this->assertIsArray($check);
        $this->assertArrayHasKey('name', $check);
    }

    /**
     * Tests listing invalid check form API
     *
     * @return void
     */
    public function testInvalidUuid()
    {
        $hc = new HealthchecksManager($_ENV['APIKEY']);

        try{
            $check = $hc->getCheck(Uuid::uuid4());
        } catch(HealthchecksUuidNotFoundException $e) {
            $this->assertTrue(true);
            return true;
        }
    }
}