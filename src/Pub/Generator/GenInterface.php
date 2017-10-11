<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category PubInterface
 * @package  Plista\Pub
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.plista.com/
 */

namespace Plista\Pub\Generator;

/**
 * Interface for implementing publisher functionality
 *
 * @category Interface
 * @package  PubInterface
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.plista.com/
 */
interface GenInterface
{
    /**
     * Generate unpredictable amount of entries for publisher
     *
     * @param integer $maximum amount of items to be generated
     * @return array of stdClass items for publication
     */
    public function generate($maximum);
}