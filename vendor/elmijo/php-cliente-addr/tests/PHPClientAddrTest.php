<?php

class PHPClientAddrTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->cliaddr = new PHPTools\PHPClientAddr\PHPClientAddr();

        $this->assertInstanceOf('PHPTools\PHPClientAddr\PHPClientAddr', $this->cliaddr);
    }

    public function testOne()
    {
        $this->assertInternalType('string', $this->cliaddr->ip);
        $this->assertInternalType('string', $this->cliaddr->hostname);
        $this->assertTrue(!!filter_var($this->cliaddr->ip, FILTER_VALIDATE_IP));
        
    }
}