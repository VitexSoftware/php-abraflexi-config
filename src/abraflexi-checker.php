<?php

namespace AbraFlexi;

require_once '../vendor/autoload.php';
define('EASE_APPNAME', 'AbraFlexiConnectionChecker');

\Ease\Shared::init(['ABRAFLEXI_URL', 'ABRAFLEXI_LOGIN', 'ABRAFLEXI_PASSWORD', 'ABRAFLEXI_COMPANY'], '../.env');

$checker = new Company();

$infoRaw = $checker->getFlexiData();
$info = is_array($infoRaw) && !array_key_exists('message', $infoRaw) ? \Ease\Functions::reindexArrayBy($infoRaw, 'dbNazev') : [];
$myCompany = $checker->getCompany();
$checker->logBanner();

$checker->addStatusMessage(
    'connection test',
    array_key_exists($myCompany, $info) ? 'success' : 'error'
);

return( array_key_exists($myCompany, $info) ? 0 : 1 );
