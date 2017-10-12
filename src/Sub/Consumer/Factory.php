<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category SubInterface
 * @package  Plista\Sub
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */

namespace Plista\Sub\Consumer;

/**
 * Consumer\Factory creates consumer depends on queue item type
 *
 * @category Class
 * @package  Factory
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */
class Factory
{
    /**
     * Creates one consumer object depends on item type
     *
     * @param integer $type
     *
     * @return ConsumerInterface
     */
    public static function create($type)
    {
        $consumerClass = 'Plista\\Sub\\Consumer\\' . $type.'Consumer';
        return new $consumerClass();
    }
}
