<?php declare(strict_types=1);

namespace Tests;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/Product.php';


use App\Product\Product;
use PHPUnit\Framework\TestCase;

final class StackTest extends TestCase
{
    //mock recommendation: mock only service and entity

    /**
     * Testing
     */
    //unit test = test one specific function on a class(fake any needed db connection)
    //integration test = just like unit test Except it uses the real database connection
    //functional test = write a test to programmatically command a browser
    //TDD - 1. create test 2.write just enough code for test to pass, 3. refactor code

    /**
     * test double
     */
    //A test double is an object that can stand in for a real object in a test

    private $length;
    static $count;

    /**
     * Hooks
     *
     * called once before each test
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->length = 0;
    }

    /**
     * Hooks
     *
     * Called once after each test
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Hooks
     *
     * Called once for entire class
     *
     * For global or static setup
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        self::$count = 1;
    }

    /**
     * Hooks
     *
     * Called once after class
     */
    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();

    }

    /**
     * Hooks
     *
     * Print extra debugging info
     *
     *
     * @param \Throwable $t
     * @throws \Throwable
     *
     */
    protected function onNotSuccessfulTest(\Throwable $t): void
    {
        parent::onNotSuccessfulTest($t);
    }


    public function testPushAndPop(): void
    {
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }

    public function testLengthOnSetup()
    {
        $this->assertEquals(0, $this->length);
    }

    public function testLengthOnSetupBeforeClass()
    {
        $this->assertEquals(1, $this->count());
    }

    public function testMc()
    {
        if(self::$count != 2) {
            self::markTestSkipped('No need to test');
        }
    }

    public function testMtIncomplete()
    {
        if(self::$count != 2) {
            self::markTestIncomplete('incomplete');
        }
    }

    /**
     * @dataProvider DpProvider
     */
    public function testDp($param1,$param2, $expected)
    {
        if($param1 == 1) {
            self::assertEquals($param1+$param2, 2);
            self::assertTrue($expected);
        }
        if($param1 == 2) {
            self::assertEquals($param1+$param2, 2);
            self::assertFalse($expected);
        }
    }

    public function DpProvider()
    {
        return [
            [1,1, true],
            [2,2, false],
        ];
    }

    public function testException()
    {
        $p = new Product();

        $this->expectException(\Exception::class);
        $p->setPrice(-1);

        $this->assertEquals('one', $p->getName());
    }

    public function testExceptionMessage()
    {
        $p = new Product();

        $this->expectExceptionMessage('Price should be greater than zero');
        $p->setPrice(-1);

        $this->assertEquals('one', $p->getName());
    }

    /**
     * Test Doubles
     */
    //Dummy - When a particular type of object is required as an argument, but it is not used in any significant way
    //Stub - When a test double is supposed to return some fixed values
    //Fake - this is an implementation of the dependency that has all the same methods as the actual implementation, but wouldn’t actually be used in Production
    //Spy - Records the way in which it’s used – or “spies” on it – and later allows you to access that recorded information to make an assertion in your test
    //Mock - Mocks are pre-programmed with expectations which form a specification of the calls they are expected to receive.
    ////Summary - Dummies and Stubs are often used in correctness and contract type unit tests, Spies and Mocks are used most often in collaboration unit tests, and Fakes tend to be used in integrated testing
}