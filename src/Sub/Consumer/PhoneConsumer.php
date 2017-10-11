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

class PhoneConsumer implements ConsumerInterface
{
    /**
     * Consume one phone to show out
     *
     * @param $phone \stdClass to be observed
     * @return boolean result
     */
    public function consume($phone)
    {
        if($phone->type = 'Phone') {
            echo 'Phone ' . $phone->content . ' served and observed' . PHP_EOL;
            return true;
        } else {
            return false;
        }
    }
}