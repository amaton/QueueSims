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
class PhoneGenerator extends AbstractGenerator
{
    protected $type = 'phone';

    /**
     * @return string randomly generated phone number
     */
    protected function genContent()
    {
        return '+' . rand(1000000000, 9999998888);
    }
}
