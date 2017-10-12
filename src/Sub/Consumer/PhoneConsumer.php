<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category PhoneConsumer
 * @package  Plista\Sub\Consumer
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */

namespace Plista\Sub\Consumer;

/**
 * PhoneConsumer to observe one phone from queue
 *
 * @category Class
 * @package  PhoneConsumer
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */
class PhoneConsumer implements ConsumerInterface
{
    /**
     * Consume one phone to show out
     *
     * @param $phone \stdClass to be observed
     *
     * @return boolean result
     */
    public function consume($phone)
    {
        if ($phone->type == 'Phone') {
            echo sprintf('Phone <%s> served and observed %s', $phone->phone, PHP_EOL);
            return true;
        } else {
            return false;
        }
    }
}
