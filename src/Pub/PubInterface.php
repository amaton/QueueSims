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

namespace Plista\Pub;

use Plista\Pub\Generator\GenInterface;
use Plista\QueueSimsInterface;

/**
 * Interface for implementing publisher functionality
 *
 * @category Interface
 * @package  PubInterface
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.plista.com/
 */
interface PubInterface
{
    /**
     * Publish unpredictable amount of entries to the queue
     *
     * @param QueueSimsInterface $queue where to publish items
     * @param GenInterface $generator to generate publications
     *
     * @return integer amount of published entities
     */
    public function publish(QueueSimsInterface $queue, GenInterface $generator);
}
