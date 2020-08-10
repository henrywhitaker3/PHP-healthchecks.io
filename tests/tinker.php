<?php

use Henrywhitaker3\Healthchecks\HealthchecksManager;

require_once(__DIR__.'/../vendor/autoload.php');

$hm = new HealthchecksManager('g2LEsTFpvrlQwrWjNPgwBjaVizLPP0sc');

print_r($hm->getCheckStatusChanges('de680c32-60d3-4c95-9470-8f9859679a51'));