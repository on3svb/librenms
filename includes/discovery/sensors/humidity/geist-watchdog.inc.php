<?php
/**
 * geist-watchdog.inc.php
 *
 * LibreNMS humidity discovery module for Geist Watchdog
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    LibreNMS
 * @link       http://librenms.org
 * @copyright  2017 Neil Lathwood
 * @author     Neil Lathwood <gh+n@laf.io>
 */

$value = return_number(snmp_get($device, 'climateHumidity', '-Oqv', 'GEIST-MIB-V3'));
if ($value) {
    $current_oid = '.1.3.6.1.4.1.21239.2.2.1.7.1';
    $descr = 'Humidity';
    discover_sensor($valid['sensor'], 'humidity', $device, $current_oid, 'climateHumidity', 'geist-watchdog', $descr, 1, 1, null, null, null, null, $value);
}

$value = return_number(snmp_get($device, 'internalHumidity.1', '-Oqv', 'GEIST-V4-MIB'));
if ($value) {
    $current_oid = '.1.3.6.1.4.1.21239.5.1.2.1.6.1';
    $descr = 'Internal humidity';
    discover_sensor($valid['sensor'], 'humidity', $device, $current_oid, 'internalHumidity.1', 'geist-watchdog', $descr, 1, 1, null, null, null, null, $value);
}
