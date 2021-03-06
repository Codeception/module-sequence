<?php

class SequenceTest extends \Codeception\Test\Unit
{
    // tests
    public function testSequences()
    {
        $container = \Codeception\Util\Stub::make('Codeception\Lib\ModuleContainer');
        $module = new \Codeception\Module\Sequence($container);
        $this->assertNotEquals(sq(), sq());
        $this->assertNotEquals(sq(1), sq(2));
        $this->assertEquals(sq(1), sq(1));
        $old = sq(1);
        $module->_after($this);
        $this->assertNotEquals($old, sq(1));
    }

    public function testSuiteSequences()
    {
        $container = \Codeception\Util\Stub::make('Codeception\Lib\ModuleContainer');
        $module = new \Codeception\Module\Sequence($container);
        $this->assertNotEquals(sqs(), sqs());
        $this->assertNotEquals(sqs(1), sqs(2));
        $this->assertEquals(sqs(1), sqs(1));
        $old = sqs(1);
        $module->_after($this);
        $this->assertEquals($old, sqs(1));
        $module->_afterSuite();
        $this->assertNotEquals($old, sqs(1));
    }
}
