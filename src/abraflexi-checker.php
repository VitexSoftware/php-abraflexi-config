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

\Ease\Shared::init([], '../.env');

$options = getopt('o::e::', ['output::environment::']);
Shared::init(
    [
        'ABRAFLEXI_URL', 'ABRAFLEXI_LOGIN', 'ABRAFLEXI_PASSWORD', 'ABRAFLEXI_COMPANY'
    ],
    \array_key_exists('environment', $options) ? $options['environment'] : (\array_key_exists('e', $options) ? $options['e'] : '../.env'),
);
$destination = \array_key_exists('o', $options) ? $options['o'] : (\array_key_exists('output', $options) ? $options['output'] : Shared::cfg('RESULT_FILE', 'php://stdout'));

$now = new DateTime();
$report['source'] = \Ease\Shared::appName().' '. \Ease\Shared::appVersion().' '.
$report['when'] =  $now->format('Y-m-d').' '.$now->format('H:i:s');

$checker = new Company();

$infoRaw = $checker->getFlexiData();
$info = \is_array($infoRaw) && !\array_key_exists('message', $infoRaw) ? \Ease\Functions::reindexArrayBy($infoRaw, 'dbNazev') : [];
$myCompany = $checker->getCompany();

if (Shared::cfg('APP_DEBUG', false)) {
    $engine->logBanner();
}

$checker->addStatusMessage(
    'connection test',
    \array_key_exists($myCompany, $info) ? 'success' : 'error',
);

$exitcode = \array_key_exists($myCompany, $info) ? 0 : 1;

$report['success'] = \array_key_exists($myCompany, $info) ? 0 : 1;
$checker->addStatusMessage('stage 6/6: saving report', 'debug');

$report['exitcode'] = $exitcode;
$written = file_put_contents($destination, json_encode($report, Shared::cfg('DEBUG') ? \JSON_PRETTY_PRINT | \JSON_UNESCAPED_UNICODE : 0));
$checker->addStatusMessage(sprintf(_('Saving result to %s'), $destination), $written ? 'success' : 'error');

exit($exitcode);
