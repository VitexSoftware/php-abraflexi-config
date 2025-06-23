<?php

declare(strict_types=1);

/**
 * This file is part of the EaseTWBootstrap4 package
 *
 * https://github.com/VitexSoftware/php-abraflexi-config
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AbraFlexi;

require_once '../vendor/autoload.php';
\define('EASE_APPNAME', 'AbraFlexiConnectionChecker');

\Ease\Shared::init(['ABRAFLEXI_URL', 'ABRAFLEXI_LOGIN', 'ABRAFLEXI_PASSWORD', 'ABRAFLEXI_COMPANY'], '../.env');

$checker = new Company();

$infoRaw = $checker->getFlexiData();
$info = \is_array($infoRaw) && !\array_key_exists('message', $infoRaw) ? \Ease\Functions::reindexArrayBy($infoRaw, 'dbNazev') : [];
$myCompany = $checker->getCompany();
$checker->logBanner();

$checker->addStatusMessage(
    'connection test',
    \array_key_exists($myCompany, $info) ? 'success' : 'error',
);

return \array_key_exists($myCompany, $info) ? 0 : 1;
