<?php

namespace AbraFlexi;

require_once '../vendor/autoload.php';
define('EASE_APPNAME', 'php-abraflexi-checker');
define('EASE_LOGGER', 'console|syslog');

$shared = new \Ease\Shared();

$status = [];

if (empty(\Ease\Functions::cfg('ABRAFLEXI_URL'))) {
    $cfgFile = '../client.json';
    if (file_exists($cfgFile)) {
        $loaded = $shared->loadConfig($cfgFile, true);
        $status[empty($loaded) ? 'warning' : 'success'] = 'Loading config file ' . $cfgFile . ' ' . count($loaded) . ' items loaded';
    }
} else {
    $status['info'] = 'loading configuration from environment';
}

$checker = new Company();

$checker->addStatusMessage(current($status), key($status));

$infoRaw = $checker->getFlexiData();
$info = is_array($infoRaw) && !array_key_exists('message', $infoRaw) ? \Ease\Functions::reindexArrayBy($infoRaw, 'dbNazev') : [];
$myCompany = $checker->getCompany();
$checker->logBanner();

$checker->addStatusMessage('connection test',
        array_key_exists($myCompany, $info) ? 'success' : 'error' );

return( array_key_exists($myCompany, $info) ? 0 : 1 );
