<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category EmailGenerator
 * @package  Plista\Pub\Generator
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.plista.com/
 */

namespace Plista\Pub\Generator;

/**
 * Class generator for publisher functionality
 *
 * @category Class
 * @package  EmailGenerator
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.plista.com/
 */
class EmailGenerator implements GenInterface
{
    const TYPE = 'Email';

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
        $itemsCount = rand($minimum, $maximum);
        for ($i = 1; $i <= $itemsCount; $i++) {
            $publication = new \stdClass();
            $publication->type = self::TYPE;
            $publication->email = $this->generateEmailAddress(7, 5);
            $publications[] = $publication;
        }
        return $publications;
    }

    /**
     * Generate random email address with predicted length
     *
     * @link https://stackoverflow.com/a/40299269
     *
     * @param int $maxLenLocal
     * @param int $maxLenDomain
     *
     * @return string
     */
    final private function generateEmailAddress($maxLenLocal = 64, $maxLenDomain = 255)
    {
        $numeric        =  '0123456789';
        $alphabetic     = 'abcdefghijklmnopqrstuvwxyz';
        $extras         = '.-_';
        $all            = $numeric . $alphabetic . $extras;
        $alphaNumeric   = $alphabetic . $numeric;
        $randomString   = '';

        // GENERATE 1ST 4 CHARACTERS OF THE LOCAL-PART
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $alphabetic[rand(0, strlen($alphabetic) - 1)];
        }
        // GENERATE A NUMBER BETWEEN 3 & $maxLenLocal-4
        $rndNum         = rand(3, $maxLenLocal);

        for ($i = 0; $i < $rndNum; $i++) {
            $randomString .= $all[rand(0, strlen($all) - 1)];
        }

        // ADD AN @ SYMBOL...
        $randomString .= "@";

        // GENERATE DOMAIN NAME - INITIAL 3 CHARS:
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $alphabetic[rand(0, strlen($alphabetic) - 1)];
        }

        // GENERATE A NUMBER BETWEEN 15 & $maxLenDomain-7
        $rndNum2        = rand(15, $maxLenDomain-7);
        for ($i = 0; $i < $rndNum2; $i++) {
            $randomString .= $all[rand(0, strlen($all) - 1)];
        }
        // ADD AN DOT . SYMBOL...
        $randomString .= ".";

        // GENERATE TLD: 4
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
        }

        return $randomString;
    }
}
