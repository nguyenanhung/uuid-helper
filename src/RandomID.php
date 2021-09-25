<?php
/**
 * Project uuid-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/25/2021
 * Time: 07:32
 */

namespace nguyenanhung\Libraries\UUID;

/**
 * Class RandomID
 *
 * @package   nguyenanhung\Libraries\UUID
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class RandomID
{
    /**
     * Function random
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 37:23
     */
    public static function random(): string
    {
        $randomId = uniqid(date('Ymd'), true);
        $randomId = str_replace('.', '', $randomId);

        return trim($randomId);
    }
}
