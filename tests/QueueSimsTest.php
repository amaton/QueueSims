<?php
/**
 * Plista\ coding challenge with queue simulation
 *
 * PHP Version 7
 *
 * @category QueueSimsTest
 * @package  Plista
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Sublic License
 * @link     https://www.plista.com/
 */

namespace Plista;

use Plista\Sub;
use Plista\Pub;
use PHPUnit\Framework\TestCase;

/**
 * Plista\QueueSimsTest TestCase Class;
 *
 * @category Class
 * @package  Tests
 * @author   Anton Amatuni <amatonn@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.native-instruments.com/en/
 */
class QueueSimsTest extends TestCase
{
    /**
     * @var QueueSimsInterface
     */
    private $queue;

    /**
     * @var array of Sub\SubInterface
     */
    private $subscribers = [];

    public function setUp()
    {
        $this->queue = new QueueSim();
        $this->subscribers = [
            new Sub\Subscriber($this->queue),
        ];
    }

    /**
     * Test wrong queue overload by email
     */
    public function testEmailOverload()
    {
        $this->expectException(Overload\Exception::class);
        $this->expectExceptionMessage('Queue was overloaded');
        $publisher = new Pub\Publisher();
        while (true) {
            $publisher->publish($this->queue, new Pub\Generator\EmailGenerator());
        }
    }

    /**
     * Test wrong queue overload by phones
     */
    public function testPhonesOverload()
    {
        $this->expectException(Overload\Exception::class);
        $this->expectExceptionMessage('Queue was overloaded');
        $publisher = new Pub\Publisher();
        while (true) {
            $publisher->publish($this->queue, new Pub\Generator\PhoneGenerator());
        }
    }

    /**
     * Test Queue simulation with phones
     *
     * @param integer subscribersAmount
     * @param integer turns amount
     *
     * @dataProvider queueSimDataProvider
     */
    public function testQueueSimPhones($turns, $subscribersAmount)
    {
        $publisher = new Pub\Publisher($this->queue->getMaxAmount()/10, $this->queue->getMaxAmount()/10);
        for ($i = 0; $i < $turns; $i++) {
            $publisher->publish($this->queue, new Pub\Generator\PhoneGenerator());
            $this->subscribers = ConsumingLoadBalancer::loadBalance($this->queue, ...$this->subscribers);
        }
        self::assertEquals($subscribersAmount, count($this->subscribers));
    }

    /**
     * Test Queue simulation with emails
     *
     * @param integer subscribersAmount
     * @param integer turns amount
     *
     * @dataProvider queueSimDataProvider
     */
    public function testQueueSimEmail($turns, $subscribersAmount)
    {
        $publisher = new Pub\Publisher($this->queue->getMaxAmount()/10, $this->queue->getMaxAmount()/10);
        for ($i = 0; $i < $turns; $i++) {
            $publisher->publish($this->queue, new Pub\Generator\EmailGenerator());
            $this->subscribers = ConsumingLoadBalancer::loadBalance($this->queue, ...$this->subscribers);
        }
        self::assertEquals($subscribersAmount, count($this->subscribers));
    }

    /**
     * Provide input / output data
     *
     * @return array
     */
    public function queueSimDataProvider()
    {
        return [
            'turn_1' => [
                'turns' => 1,
                'subscribersAmount' => 2
            ],
            'turn_2' => [
                'turns' => 2,
                'subscribersAmount' => 4
            ],
            'turn_3' => [
                'turns' => 3,
                'subscribersAmount' => 8
            ],
            'turn_4' => [
                'turns' => 4,
                'subscribersAmount' => 16
            ],
            'turn_5' => [
                'turns' => 5,
                'subscribersAmount' => 32
            ],
            'turn_6' => [
                'turns' => 6,
                'subscribersAmount' => 64
            ],
            'turn_7' => [
                'turns' => 7,
                'subscribersAmount' => 128
            ],
            'turn_8' => [
                'turns' => 8,
                'subscribersAmount' => 256
            ],
            'turn_9' => [
                'turns' => 9,
                'subscribersAmount' => 512
            ],
        ];
    }
}
