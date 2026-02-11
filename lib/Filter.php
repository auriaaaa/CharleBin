<?php

/**
 * PrivateBin
 *
 * a zero-knowledge paste bin
 *
 * @link      https://github.com/PrivateBin/PrivateBin
 * @copyright 2012 Sébastien SAUVAGE (sebsauvage.net)
 * @license   https://www.opensource.org/licenses/zlib-license.php The zlib/libpng License
 * @version   1.5.1
 */

namespace PrivateBin;

use Exception;

/**
 * Filter
 *
 * Provides data filtering functions.
 */
class Filter
{
    /**
     * format a given time value and unit into a human readable label (localized)
     *
     * @access public
     * @static
     * @param  int    $value
     * @param  string $unit
     * @throws Exception
     * @return string
     */
    public static function formatHumanReadableTime($value, $unit)
    {
        if (!is_int($value) || $value < 0) {
            throw new Exception("Value must be a non-negative integer", 30);
        }
        if (!is_string($unit) || empty($unit)) {
            throw new Exception("Unit must be a non-empty string", 30);
        }

        switch ($unit) {
            case 'sec':
                $unitName = 'second';
                break;
            case 'min':
                $unitName = 'minute';
                break;
            default:
                $unitName = rtrim($unit, 's');
        }

        return I18n::_(array('%d ' . $unitName, '%d ' . $unitName . 's'), $value);
    }

    /**
     * format a given number of bytes in IEC 80000-13:2008 notation (localized)
     *
     * @access public
     * @static
     * @param  int $size
     * @return string
     */
    public static function formatHumanReadableSize($size)
    {
        $iec = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB');
        $i   = 0;
        while (($size / 1024) >= 1) {
            $size = $size / 1024;
            ++$i;
        }
        return number_format($size, ($i ? 2 : 0), '.', ' ') . ' ' . I18n::_($iec[$i]);
    }
}
