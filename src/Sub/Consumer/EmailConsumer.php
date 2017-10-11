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

class EmailConsumer implements ConsumerInterface
{
    /**
     * Consume one email to show out
     *
     * @param $email \stdClass to be observed
     * @return boolean result
     */
    public function consume($email)
    {
        if($email->type = 'Email') {
            echo 'Email ' . $email->content . ' served and observed' . PHP_EOL;
            return true;
        } else {
            return false;
        }
    }
}