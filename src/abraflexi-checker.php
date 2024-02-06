<?php

namespace AbraFlexi;

require_once '../vendor/autoload.php';
define('EASE_APPNAME', 'php-abraflexi-checker');

$shared = new \Ease\Shared();

$status = [];

\Ease\Shared::init(['ABRAFLEXI_URL', 'ABRAFLEXI_LOGIN', 'ABRAFLEXI_PASSWORD', 'ABRAFLEXI_COMPANY'], file_exists('../.env') ? '../.env' : null);

$checker = new Company();

$checker->addStatusMessage(current($status), key($status));

$infoRaw = $checker->getFlexiData();
$info = is_array($infoRaw) && !array_key_exists('message', $infoRaw) ? \Ease\Functions::reindexArrayBy($infoRaw, 'dbNazev') : [];
$myCompany = $checker->getCompany();
$checker->logBanner();

$checker->addStatusMessage(
    'connection test',
    array_key_exists($myCompany, $info) ? 'success' : 'error'
);

return( array_key_exists($myCompany, $info) ? 0 : 1 );
