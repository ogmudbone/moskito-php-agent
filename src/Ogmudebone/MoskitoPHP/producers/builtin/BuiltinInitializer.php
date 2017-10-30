<?php

namespace Ogmudebone\MoskitoPHP\producers\builtin;

class BuiltinInitializer
{

    public static function initialize()
    {
        self::initializeScriptExecutionProducer();
    }

    private static function initializeScriptExecutionProducer()
    {

        $currentURI = array_key_exists('REQUEST_URI', $_SERVER)
            ? $_SERVER['REQUEST_URI']
            : 'Undefined';

        $executionProducer = new ServiceOrientedProducer(
            'script-execution', 'php', 'php'
        );

        $executionWatcher = $executionProducer->getWatcher($currentURI);
        $executionWatcher->start();

        register_shutdown_function(function() use ($executionWatcher) {
            $executionWatcher->end();
        });

    }

}