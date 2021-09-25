<?php
/**
 * Project uuid-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/22/2021
 * Time: 18:03
 */
require_once __DIR__ . '/../vendor/autoload.php';

use nguyenanhung\Libraries\UUID\UUID;
use nguyenanhung\Libraries\UUID\AlphaID;
use nguyenanhung\Libraries\UUID\RandomID;

echo "RandomID: " . RandomID::random() . PHP_EOL;
echo "RandomID Length: " . mb_strlen(RandomID::random()) . PHP_EOL;
echo "AlphaID: " . AlphaID::generateAlphaId(time()) . PHP_EOL;
echo "UUID v1: " . UUID::v1(1234, 2) . PHP_EOL;
echo "UUID v3: " . UUID::v3('c558209e-1d95-11ec-8002-0000000004d2', 'hungng') . PHP_EOL;
echo "UUID v4: " . UUID::v4() . PHP_EOL;
echo "UUID v4 Length: " . mb_strlen(UUID::v4()) . PHP_EOL;
echo "UUID v5: " . UUID::v5('c558209e-1d95-11ec-8002-0000000004d2', 'hungng') . PHP_EOL;
echo "UUID v6: " . UUID::v1(12345, 3) . PHP_EOL;
