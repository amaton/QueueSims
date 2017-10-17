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
use Plista\Pub\Generator\PhoneGenerator;

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
     * @return ConsumerInterface | boolean false if consumer not found
     */
    public static function create($type)
    {
        $type = ucfirst($type);
        $consumerClass = 'Plista\\Sub\\Consumer\\' . $type.'Consumer';
        if (class_exists($consumerClass)) {
            return new $consumerClass();
        }

        return  false;
    }
}
