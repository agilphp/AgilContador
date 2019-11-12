<?php

class PHPErrorLog extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->logger = new PHPTools\PHPErrorLog\PHPErrorLog();

        $this->filelog = realpath('tests/assert/tests.log');

        $this->assertInstanceOf('PHPTools\PHPErrorLog\PHPErrorLog', $this->logger);

        $this->assertTrue(!!is_writable($this->filelog));
    }

    public function testConstants()
    {
        $this->assertInternalType('integer',PEL_EMERGENCY);
        $this->assertInternalType('integer',PEL_ALERT);
        $this->assertInternalType('integer',PEL_CRITICAL);
        $this->assertInternalType('integer',PEL_ERROR);
        $this->assertInternalType('integer',PEL_WARNING);
        $this->assertInternalType('integer',PEL_NOTICE);
        $this->assertInternalType('integer',PEL_INFO);
        $this->assertInternalType('integer',PEL_DEBUG);

        $this->assertEquals(PEL_EMERGENCY,0);
        $this->assertEquals(PEL_ALERT,1);
        $this->assertEquals(PEL_CRITICAL,2);
        $this->assertEquals(PEL_ERROR,3);
        $this->assertEquals(PEL_WARNING,4);
        $this->assertEquals(PEL_NOTICE,5);
        $this->assertEquals(PEL_INFO,6);
        $this->assertEquals(PEL_DEBUG,7);
    }

    public function testWriteLogs()
    {
        $this->assertTrue($this->logger->write('Probando log emergency',PEL_EMERGENCY));
        $this->assertTrue($this->logger->write('Probando log alert',PEL_ALERT));
        $this->assertTrue($this->logger->write('Probando log critical',PEL_CRITICAL));
        $this->assertTrue($this->logger->write('Probando log error',PEL_ERROR));
        $this->assertTrue($this->logger->write('Probando log warning',PEL_WARNING));
        $this->assertTrue($this->logger->write('Probando log notice',PEL_NOTICE));
        $this->assertTrue($this->logger->write('Probando log info',PEL_INFO));
        $this->assertTrue($this->logger->write('Probando log debug',PEL_DEBUG));
    }

    public function testWriteMailLogs()
    {
        ini_set("SMTP", "74.125.21.26");
        ini_set("sendmail_from", "test@testmail.com");
        $headers = array(
            'From'    => 'test@testmail.com',
            'Subject' => 'Probando PHPErrorLog'
        );
        $this->assertTrue($this->logger->write('Probando log emergency',PEL_EMERGENCY,"Jerry Anselmi <jerry.anselmi@gmail.com>",$headers));
        $this->assertTrue($this->logger->write('Probando log alert',PEL_ALERT,"Jerry Anselmi <jerry.anselmi@gmail.com>",$headers));
        $this->assertTrue($this->logger->write('Probando log critical',PEL_CRITICAL,"Jerry Anselmi <jerry.anselmi@gmail.com>",$headers));
        $this->assertTrue($this->logger->write('Probando log error',PEL_ERROR,"Jerry Anselmi <jerry.anselmi@gmail.com>",$headers));
        $this->assertTrue($this->logger->write('Probando log warning',PEL_WARNING,"Jerry Anselmi <jerry.anselmi@gmail.com>",$headers));
        $this->assertTrue($this->logger->write('Probando log notice',PEL_NOTICE,"Jerry Anselmi <jerry.anselmi@gmail.com>",$headers));
        $this->assertTrue($this->logger->write('Probando log info',PEL_INFO,"Jerry Anselmi <jerry.anselmi@gmail.com>",$headers));
        $this->assertTrue($this->logger->write('Probando log debug',PEL_DEBUG,"Jerry Anselmi <jerry.anselmi@gmail.com>",$headers));
    }
    public function testWriteFileLogs()
    {

        $this->assertTrue($this->logger->write('Probando log emergency',PEL_EMERGENCY,$this->filelog));
        $this->assertTrue($this->logger->write('Probando log alert',PEL_ALERT,$this->filelog));
        $this->assertTrue($this->logger->write('Probando log critical',PEL_CRITICAL,$this->filelog));
        $this->assertTrue($this->logger->write('Probando log error',PEL_ERROR,$this->filelog));
        $this->assertTrue($this->logger->write('Probando log warning',PEL_WARNING,$this->filelog));
        $this->assertTrue($this->logger->write('Probando log notice',PEL_NOTICE,$this->filelog));
        $this->assertTrue($this->logger->write('Probando log info',PEL_INFO,$this->filelog));
        $this->assertTrue($this->logger->write('Probando log debug',PEL_DEBUG,$this->filelog));
    }
}