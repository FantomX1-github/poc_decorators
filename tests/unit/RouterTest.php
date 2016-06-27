<?php


class RouterTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     * @global $tester Router
     */
    protected $tester;

    protected function _before()
    {
        $this->tester = new Router();
    }

    protected function _after()
    {
    }

    // tests
    public function testClassExist()
    {
        $this->assertTrue(class_exists('Router'));
    }
    public function testSetUrl(){
        /**
         * @var $tester Router
         */
        $tester = $this->tester;
        $this->assertInstanceOf('Router', $tester->setRequestUrl('/'));
    }
    public function testController(){
        $tester = new Router('/');
        $this->assertEquals('Welcome', $tester->getController());

        $tester->setRequestUrl('/login');
        $this->assertEquals('Login', $tester->getController());

        $tester->setRequestUrl('/login/forgot');
        $this->assertEquals('Login', $tester->getController());
    }

    public function testMethod(){
        $tester = new Router('/');
        $this->assertEquals('index', $tester->getMethod());

        $tester->setRequestUrl('/login');
        $this->assertEquals('index', $tester->getMethod());

        $tester->setRequestUrl('/login/forgot');
        $this->assertEquals('forgot', $tester->getMethod());
    }
}