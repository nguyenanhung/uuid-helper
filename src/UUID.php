<?php
/**
 * Project uuid-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/22/2021
 * Time: 18:06
 */

namespace nguyenanhung\Libraries\UUID;

/**
 * Class UUID
 *
 * @package   nguyenanhung\Libraries\UUID
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class UUID
{
    /**
     * Function v3
     *
     * @param $namespace
     * @param $name
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 11/6/19 58:41
     */
    public static function v3($namespace, $name)
    {
        if (!self::isValid($namespace)) {
            return false;
        }

        // Get hexadecimal components of namespace
        $nhex = str_replace(array('-', '{', '}'), '', $namespace);

        // Binary Value
        $nstr    = '';
        $nhexLen = strlen($nhex);
        // Convert Namespace UUID to bits
        for ($i = 0; $i < $nhexLen; $i += 2) {
            $nstr .= chr(hexdec($nhex[$i] . $nhex[$i + 1]));
        }

        // Calculate hash value
        $hash = md5($nstr . $name);

        return sprintf('%08s-%04s-%04x-%04x-%12s',

            // 32 bits for "time_low"
                       substr($hash, 0, 8),

            // 16 bits for "time_mid"
                       substr($hash, 8, 4),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 3
                       (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x3000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
                       (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,

            // 48 bits for "node"
                       substr($hash, 20, 12)
        );
    }

    /**
     * Function v4
     *
     * @return string
     * @throws \Exception
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/24/2021 55:31
     */
    public static function v4(): string
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
                       random_int(0, 0xffff), random_int(0, 0xffff),

            // 16 bits for "time_mid"
                       random_int(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
                       random_int(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
                       random_int(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
                       random_int(0, 0xffff), random_int(0, 0xffff), random_int(0, 0xffff)
        );
    }

    /**
     * Function v5
     *
     * @param $namespace
     * @param $name
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 11/6/19 58:55
     */
    public static function v5($namespace, $name)
    {
        if (!self::isValid($namespace)) {
            return false;
        }

        // Get hexadecimal components of namespace
        $nhex = str_replace(array('-', '{', '}'), '', $namespace);

        // Binary Value
        $nstr = '';

        $nhexLen = strlen($nhex);
        // Convert Namespace UUID to bits
        for ($i = 0; $i < $nhexLen; $i += 2) {
            $nstr .= chr(hexdec($nhex[$i] . $nhex[$i + 1]));
        }

        // Calculate hash value
        $hash = sha1($nstr . $name);

        return sprintf('%08s-%04s-%04x-%04x-%12s',

            // 32 bits for "time_low"
                       substr($hash, 0, 8),

            // 16 bits for "time_mid"
                       substr($hash, 8, 4),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 5
                       (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x5000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
                       (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,

            // 48 bits for "node"
                       substr($hash, 20, 12)
        );
    }

    /**
     * Function isValid
     *
     * @param $uuid
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 11/6/19 59:04
     */
    public static function isValid($uuid): bool
    {
        $uuidPattern = '/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?' . '[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i';

        return preg_match($uuidPattern, $uuid) === 1;
    }
}