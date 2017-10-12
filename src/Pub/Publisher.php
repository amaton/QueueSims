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
class Publisher implements PubInterface
{
    /* @var integer $minimumPublications */
    private $minimumPublications = 1;
    /* @var integer $maximumPublications */
    private $maximumPublications = 100;

    /**
     * Publisher constructor.
     *
     * @param integer $minimum amount of items to be generated
     * @param integer $maximum amount of items to be generated
     */
    public function __construct($maximumPublications = 100, $minimumPublications = 1)
    {
        $this->minimumPublications = $minimumPublications;
        $this->maximumPublications = $maximumPublications;
    }

    /**
     * Publish unpredictable amount of entries to the queue
     *
     * @param QueueSimsInterface $queue where to publish an item
     * @param GenInterface $generator to generate publications
     *
     * @return integer amount of published entities
     */
    public function publish(QueueSimsInterface $queue, GenInterface $generator)
    {
        $publications = $generator->generate($this->maximumPublications, $this->minimumPublications);
        $queue->welcome(...$publications);
        unset($generator);
        return count($publications);
    }
}
