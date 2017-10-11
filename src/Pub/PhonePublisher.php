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
class PhonePublisher implements PubInterface
{
    const TYPE = 'phone';

    /**
     * Publish unpredictable amount of entries to the queue
     *
     * @param QueueSimsInterface $queue where to publish an item;
     * @return integer amount of published entities
     */
    public function publish(QueueSimsInterface $queue)
    {
        $publications = [];
        $itemsCount = rand(1, $queue->getMaxAmount()/5);
        for ($i=1; $i<= $itemsCount; $i++) {
            $publication = new \stdClass();
            $publication->type = self::TYPE;
            $publication->content = '+' . rand(1000000000,9999998888);
            $publications[] = $publication;
        }
        $queue->welcome(...$publications);
        return count($publications);
    }
}