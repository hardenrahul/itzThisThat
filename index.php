<?php

define("THIS", __DIR__ . DIRECTORY_SEPARATOR . "This" . DIRECTORY_SEPARATOR);
define("THAT", __DIR__ . DIRECTORY_SEPARATOR . "That" . DIRECTORY_SEPARATOR);

require_once(THIS . "This.php");
error_reporting(E_ALL);

$Database = This\This::loadClass("This\Database\Database", "");

$Request = This\This::loadClass("This\Request\Request", "");

$Route = This\This::loadClass("This\Route\Route", "");

$Directory = $Route->getDirectory();
$What = $Route->getWhat();
$Action = $Route->getAction();

$Model = This\This::loadClass("This\Model\Model", array());

$Input = This\This::loadClass("This\Input\Input", array());

$Output = This\This::loadClass("This\Output\Output", array());

$Response = This\This::loadClass("This\Response\Response", array());

$Load = This\This::loadClass("This\Load\Load", array());

$Controller = This\This::loadClass("This\Controller\Controller", "", array(), FALSE);

$That = This\This::loadClass("That" . DIRECTORY_SEPARATOR . "Controllers" . DIRECTORY_SEPARATOR . $Route->getDirectory() . $Route->getWhat(), "");

$That->$Action();

$Response->send();