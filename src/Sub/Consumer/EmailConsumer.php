<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category EmailConsumer
 * @package  Plista\Sub\Consumer
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */

namespace Plista\Sub\Consumer;

/**
 * EmailConsumer to observe one email from subscriber
 *
 * @category Class
 * @package  EmailConsumer
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */
class EmailConsumer implements ConsumerInterface
{
    /**
     * Consume one email from publisher to show out
     *
     * @param $email \stdClass to be observed
     * @return boolean result
     */
    public function consume($email)
    {
        if ($email->type == 'Email') {
            echo sprintf('Email <%s> served and observed %s', $email->email, PHP_EOL);
            return true;
        } else {
            return false;
        }
    }
}
