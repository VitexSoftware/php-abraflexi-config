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

require_once '../vendor/autoload.php';
\define('EASE_APPNAME', 'php-abraflexi-config');

$configFile = '../client.json';
$exitcode = 0;

$shared = new \Ease\Shared();

if (file_exists($configFile)) {
    $shared->loadConfig($configFile, true);
}

switch ($argc) {
    case 1:
        foreach ($shared->configuration as $configKey => $configValue) {
            echo sprintf("%-20s%s\n", $configKey.':', $configValue);
        }

        break;
    case 2:
        if (\array_key_exists($argv[1], $shared->configuration)) {
            echo $shared->getConfigValue($argv[1]);
        }

        break;
    case 3:
        $shared->setConfigValue($argv[1], $argv[2]);
        $result = file_put_contents(
            $configFile,
            json_encode($shared->configuration, \JSON_PRETTY_PRINT),
        );

        if ($result === false) {
            $exitcode = 1;
        }

        break;

    default:
        echo 'Usage: ';
        echo '       '.basename(__FILE__).'                                   -  print current config';
        echo '       '.basename(__FILE__)." ABRAFLEXI_URL                     -  print given key's value";
        echo '       '.basename(__FILE__)." ABRAFLEXI_URL http://server:port  -  set given key's to value";

        break;
}

exit($exitcode);
