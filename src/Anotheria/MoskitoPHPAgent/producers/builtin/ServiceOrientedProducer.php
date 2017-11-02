<?php

namespace Anotheria\MoskitoPHPAgent\producers\builtin;

use Anotheria\MoskitoPHPAgent\MoskitoPHP;
use Anotheria\MoskitoPHPAgent\producers\builtin\stats\ServiceStats;
use Anotheria\MoskitoPHPAgent\producers\MoskitoPHPProducer;

class ServiceOrientedProducer extends MoskitoPHPProducer
{

    public function __construct($producerId, $category, $subsystem)
    {
        parent::__construct($producerId, $category, $subsystem);
        MoskitoPHP::getInstance()->getProducersRepository()->addProducer($this);
    }

    public function getWatcher($statName)
    {

        /**
         * @var ServiceStats $stat
         */
        $stat = $this->addStat(new ServiceStats($statName));

        return new ServiceWatcher($stat);

    }

    protected function getMapperId()
    {
        return "service";
    }

}