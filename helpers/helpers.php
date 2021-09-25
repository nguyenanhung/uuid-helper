<?php
/**
 * Project uuid-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/22/2021
 * Time: 18:03
 */

use Ramsey\Uuid\UuidInterface;

if (!function_exists('generateUuidV3')) {
    /**
     * Function generateUuidV3
     *
     * @param $namespace
     * @param $name
     *
     * @return \Ramsey\Uuid\UuidInterface
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 22:47
     */
    function generateUuidV3($namespace, $name): UuidInterface
    {
        return nguyenanhung\Libraries\UUID\UUID::v3($namespace, $name);
    }
}
if (!function_exists('generateUuidV4')) {
    /**
     * Function generateUuidV4
     *
     * @return \Ramsey\Uuid\UuidInterface
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 24:07
     */
    function generateUuidV4(): UuidInterface
    {
        return nguyenanhung\Libraries\UUID\UUID::v4();
    }
}
if (!function_exists('generateUuidV5')) {
    /**
     * Function generateUuidV5
     *
     * @param $namespace
     * @param $name
     *
     * @return \Ramsey\Uuid\UuidInterface
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 22:55
     */
    function generateUuidV5($namespace, $name): UuidInterface
    {
        return nguyenanhung\Libraries\UUID\UUID::v5($namespace, $name);
    }
}
if (!function_exists('generate_uuid_v3')) {
    /**
     * Function generate_uuid_v3
     *
     * @param $namespace
     * @param $name
     *
     * @return \Ramsey\Uuid\UuidInterface
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 23:03
     */
    function generate_uuid_v3($namespace, $name): UuidInterface
    {
        return nguyenanhung\Libraries\UUID\UUID::v3($namespace, $name);
    }
}
if (!function_exists('generate_uuid_v4')) {
    /**
     * Function generate_uuid_v4
     *
     * @return \Ramsey\Uuid\UuidInterface
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 23:57
     */
    function generate_uuid_v4(): UuidInterface
    {
        return nguyenanhung\Libraries\UUID\UUID::v4();
    }
}
if (!function_exists('generate_uuid_v5')) {
    /**
     * Function generate_uuid_v5
     *
     * @param $namespace
     * @param $name
     *
     * @return \Ramsey\Uuid\UuidInterface
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 22:29
     */
    function generate_uuid_v5($namespace, $name): UuidInterface
    {
        return nguyenanhung\Libraries\UUID\UUID::v5($namespace, $name);
    }
}
if (!function_exists('generateAlphaId')) {
    /**
     * Translates a number to a short alphanumeric version
     *
     * Translated any number up to 9007199254740992
     * to a shorter version in letters e.g.:
     * 9007199254740989 --> PpQXn7COf
     *
     * specifiying the second argument true, it will
     * translate back e.g.:
     * PpQXn7COf --> 9007199254740989
     *
     * this function is based on any2dec && dec2any by
     * fragmer[at]mail[dot]ru
     * see: http://nl3.php.net/manual/en/function.base-convert.php#52450
     *
     * If you want the alphaID to be at least 3 letter long, use the
     * $pad_up = 3 argument
     *
     * In most cases this is better than totally random ID generators
     * because this can easily avoid duplicate ID's.
     * For example if you correlate the alpha ID to an auto incrementing ID
     * in your database, you're done.
     *
     * The reverse is done because it makes it slightly more cryptic,
     * but it also makes it easier to spread lots of IDs in different
     * directories on your filesystem. Example:
     * $part1 = substr($alpha_id,0,1);
     * $part2 = substr($alpha_id,1,1);
     * $part3 = substr($alpha_id,2,strlen($alpha_id));
     * $destindir = "/".$part1."/".$part2."/".$part3;
     * // by reversing, directories are more evenly spread out. The
     * // first 26 directories already occupy 26 main levels
     *
     * more info on limitation:
     * - http://blade.nagaokaut.ac.jp/cgi-bin/scat.rb/ruby/ruby-talk/165372
     *
     * if you really need this for bigger numbers you probably have to look
     * at things like: http://theserverpages.com/php/manual/en/ref.bc.php
     * or: http://theserverpages.com/php/manual/en/ref.gmp.php
     * but I haven't really dugg into this. If you have more info on those
     * matters feel free to leave a comment.
     *
     * @author    Kevin van Zonneveld <kevin@vanzonneveld.net>
     * @author    Simon Franz
     * @author    Deadfish
     * @copyright 2008 Kevin van Zonneveld (http://kevin.vanzonneveld.net)
     * @license   http://www.opensource.org/licenses/bsd-license.php New BSD Licence
     * @version   SVN: Release: $Id: alphaID.inc.php 344 2009-06-10 17:43:59Z kevin $
     * @link      http://kevin.vanzonneveld.net/
     *
     * @param mixed $in      String or long input to translate
     * @param bool  $to_num  Reverses translation when true
     * @param mixed $pad_up  Number or boolean padds the result up to a specified length
     * @param mixed $passKey Supplying a password makes it harder to calculate the original ID
     *
     * @return string string or long
     */
    function generateAlphaId($in, bool $to_num = false, $pad_up = false, $passKey = null): string
    {
        return nguyenanhung\Libraries\UUID\AlphaID::generateAlphaId($in, $to_num, $pad_up, $passKey);
    }
}
