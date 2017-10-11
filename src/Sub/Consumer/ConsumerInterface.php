<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category ConsumerInterface
 * @package  Plista\Sub
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */

namespace Plista\Sub\Consumer;


/**
 * Interface for implementing consumer functionality
 *
 * @category Interface
 * @package  ConsumerInterface
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */
interface ConsumerInterface
{
    /**
     * Consume one entry from the queue
     *
     * @param  \stdClass $entry
     * @return boolean results true in case of success
     */
    public function consume($entry);
}