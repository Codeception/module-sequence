<?php

declare(strict_types=1);

use Codeception\Lib\ModuleContainer;
use Codeception\Module\Sequence;
use Codeception\Test\Unit;
use Codeception\Util\Stub;

final class SequenceTest extends Unit
{
    public function testSequences(): void
    {
        $container = Stub::make(ModuleContainer::class);
        $module = new Sequence($container);
        $this->assertNotEquals(sq(''), sq(''));
        $this->assertNotEquals(sq('1'), sq('2'));
        $this->assertEquals(sq('1'), sq('1'));
        $old = sq('1');
        $module->_after($this);
        $this->assertNotEquals($old, sq('1'));
    }

    public function testSuiteSequences(): void
    {
        $container = Stub::make(ModuleContainer::class);
        $module = new Sequence($container);
        $this->assertNotEquals(sqs('1'), sqs('2'));
        $this->assertEquals(sqs('1'), sqs('1'));
        $old = sqs('1');
        $module->_after($this);
        $this->assertEquals($old, sqs('1'));
        $module->_afterSuite();
        $this->assertNotEquals($old, sqs('1'));
    }
}
