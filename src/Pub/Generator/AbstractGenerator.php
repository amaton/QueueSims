<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category PhoneGenerator
 * @package  Plista\Pub\Generator
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.plista.com/
 */

namespace Plista\Pub\Generator;

/**
 * Interface for implementing items generation functionality
 *
 * @category Class
 * @package  PhoneGenerator
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.plista.com/
 */
abstract class AbstractGenerator implements GenInterface
{
    protected $type;

    /**
     * Generate unpredictable amount of entries for publisher
     *
     * @param integer $maximum amount of items to be generated
     * @param integer $minimum amount of items to be generated
     *
     * @return array of stdClass items for publication
     */
    public function generate($maximum, $minimum = 1)
    {
        $publications = [];
        $pubsCount = rand($minimum, $maximum);
        for ($i = 1; $i <= $pubsCount; $i++) {
            $publication = new \stdClass();
            $publication->type = $this->type;
            $publication->{$this->type} = $this->genContent();
            $publications[] = $publication;
        }
        return $publications;
    }


    abstract protected function genContent();
}
