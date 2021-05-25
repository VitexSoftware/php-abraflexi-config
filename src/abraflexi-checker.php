<?php

namespace AbraFlexi;

require_once '../vendor/autoload.php';
define('EASE_APPNAME', 'php-abraflexi-checker');
define('EASE_LOGGER', 'console|syslog');

$shared = new \Ease\Shared();

if (\Ease\Functions::cfg('ABRAFLEXI_URL') === false) {
    $cfgFile = '../client.json';
    if(file_exists($cfgFile)){
       $loaded = $shared->loadConfig($cfgFile, true);
        \Ease\Shared::logger()->addStatusMessage('Loading config file '.$cfgFile, empty($loaded) ? 'warning' : 'success' );
    }
}

$checker = new Company();
$infoRaw = $checker->getFlexiData();
$info = is_array($infoRaw) && !array_key_exists('message', $infoRaw) ? \Ease\Functions::reindexArrayBy($infoRaw, 'dbNazev') : [];
$myCompany = $checker->getCompany();
$checker->logBanner();

$checker->addStatusMessage('connection test',
        array_key_exists($myCompany, $info) ? 'success' : 'error' );

return( array_key_exists($myCompany, $info) ? 0 : 1 );
