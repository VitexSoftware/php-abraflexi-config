<?php
require_once '../vendor/autoload.php';
define('EASE_APPNAME', 'php-flexibee-checker');
define('EASE_LOGGER', 'console');

$shared = new \Ease\Shared();
$shared->loadConfig('../client.json');

$checker   = new FlexiPeeHP\Company();
$infoRaw   = $checker->getFlexiData();
$info      = $checker->reindexArrayBy($infoRaw, 'dbNazev');
$myCompany = $checker->getCompany();
$checker->logBanner();

$checker->addStatusMessage('connection test',
    array_key_exists($myCompany, $info) ? 'success' : 'error' );

return( array_key_exists($myCompany, $info) ? 0 : 1 );
