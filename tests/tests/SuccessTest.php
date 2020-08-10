<?php

namespace Henrywhitaker3\Healthchecks\Tests;

use Henrywhitaker3\Healthchecks\Healthchecks;

class SuccessTest extends Test
{
    public function test()
    {
        $hc = new Healthchecks($_ENV['UUID']);

        $this->assertTrue($hc->success());
    }
}