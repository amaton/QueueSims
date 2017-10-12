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

namespace Plista\Sub;

use Plista\QueueSimsInterface;
use Plista\Sub\Consumer\ConsumerInterface;

class Subscriber implements SubInterface
{
    /* @var QueueSimsInterface to consume items from */
    private $queue;

    /**
     * Subscribe to the queue
     *
     * @param $queue QueueSimsInterface to subscribe for
     *
     * @return $this
     */
    public function __construct(QueueSimsInterface $queue)
    {
        $this->queue = $queue;
    }

    /**
     * Consume one entry from the queue
     *
     * @return boolean results true in case of success or false in case of empty queue
     */
    public function consume()
    {
        /* @var \stdClass $item */
        if ($item = $this->queue->serve()) {
            /* @var ConsumerInterface $consumer */
            $consumer = Consumer\Factory::create($item->type);
            $consumeResult = $consumer->consume($item);
            if (!$consumeResult) {
                $this->queue->welcome($item);
            };
            unset($consumer);
            return true;
        } else {
            echo 'Queue is empty' . PHP_EOL;
            return false;
        }
    }
}
