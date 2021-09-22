<?php
/**
 * Project uuid-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/22/2021
 * Time: 18:03
 */
if (!function_exists('generate_uuid_v4')) {
    /**
     * Function generate_uuid_v4
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/22/2021 08:42
     */
    function generate_uuid_v4()
    {
        return nguyenanhung\Libraries\UUID\UUID::v4();
    }
}
