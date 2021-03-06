<?php

namespace Anotheria\MoskitoPHPAgent\producers\impl\stats;

use Anotheria\MoskitoPHPAgent\producers\Stats;

/**
 * Class PHPExecutionStats
 * @package Ogmudebone\MoskitoPHP\producers
 *
 * Statistics for single server request.
 * Currently contains only execution time and error statistics.
 */
class ServiceStats extends Stats
{

    public function __construct($name)
    {
        parent::__construct($name);
        $this->setError(false);
    }

    public function setTotalTime($time){
        $this->setValue('time', $time);
    }

    public function setError($error){
        $this->setValue('error', $error);
    }

}