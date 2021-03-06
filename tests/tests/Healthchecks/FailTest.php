<?php

namespace Henrywhitaker3\Healthchecks\Tests;

use Henrywhitaker3\Healthchecks\Healthchecks;

class FailTest extends Test
{
    /**
     * Tests pinging a valid fail endpoint
     *
     * @return void
     */
    public function test()
    {
        $hc = new Healthchecks($_ENV['UUID']);

        $this->assertTrue($hc->fail());
    }
}