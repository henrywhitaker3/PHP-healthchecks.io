<?php

namespace Henrywhitaker3\Healthchecks\Tests;

use Henrywhitaker3\Healthchecks\HealthchecksManager;

class ListChecksTest extends Test
{
    /**
     * Tests listing checks form API
     *
     * @return void
     */
    public function test()
    {
        $hc = new HealthchecksManager($_ENV['APIKEY']);

        $checks = $hc->listChecks();

        $this->assertIsArray($checks);
    }
}