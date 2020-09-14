<?php
/**
 * Public alias for the application entry point
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\Filesystem\DirectoryList;


try {
    require __DIR__ . '/../app/bootstrap.php';
} catch (\Exception $e) {
    echo <<<HTML
<div style="font:12px/1.35em arial, helvetica, sans-serif;">
    <div style="margin:0 0 25px 0; border-bottom:1px solid #ccc;">
        <h3 style="margin:0;font-size:1.7em;font-weight:normal;text-transform:none;text-align:left;color:#2f2f2f;">
        Autoload error</h3>
    </div>
    <p>{$e->getMessage()}</p>
</div>
HTML;
    exit(1);
}

$params = $_SERVER;
$params[Bootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS] = array_replace_recursive(
    $params[Bootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS] ?? [],
    [
        DirectoryList::PUB => [DirectoryList::URL_PATH => ''],
        DirectoryList::MEDIA => [DirectoryList::URL_PATH => 'media'],
        DirectoryList::STATIC_VIEW => [DirectoryList::URL_PATH => 'static'],
        DirectoryList::UPLOAD => [DirectoryList::URL_PATH => 'media/upload'],
    ]
);

switch ($_SERVER['HTTP_HOST']) {
    case 'tea.ddev.site':
        $params[\Magento\Store\Model\StoreManager::PARAM_RUN_CODE] = 'tea';
        $params[\Magento\Store\Model\StoreManager::PARAM_RUN_TYPE] = 'website';
        break;
    case 'coffee.ddev.site':
        $params[\Magento\Store\Model\StoreManager::PARAM_RUN_CODE] = 'coffee';
        $params[\Magento\Store\Model\StoreManager::PARAM_RUN_TYPE] = 'website';
        break;
    case 'springer.ddev.site':
        $params[\Magento\Store\Model\StoreManager::PARAM_RUN_CODE] = 'springer';
        $params[\Magento\Store\Model\StoreManager::PARAM_RUN_TYPE] = 'website';
        break;

    default:
        $params[\Magento\Store\Model\StoreManager::PARAM_RUN_CODE] = 'base';
        $params[\Magento\Store\Model\StoreManager::PARAM_RUN_TYPE] = 'website';
        break;
}

$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $params);
/** @var \Magento\Framework\App\Http $app */
$app = $bootstrap->createApplication(\Magento\Framework\App\Http::class);
$bootstrap->run($app);
