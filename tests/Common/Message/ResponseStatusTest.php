<?php

namespace League\Omnipay\Common\Message;

use League\Omnipay\Tests\TestCase;

class ResponseStatusTest extends TestCase
{
    /**
     * @test
     */
    public function itRepresentsResponseStatuses()
    {
        $this->assertSame('authorized', ResponseStatus::AUTHORIZED()->toString());
        $this->assertSame('cancelled', ResponseStatus::CANCELLED()->toString());
        $this->assertSame('captured', ResponseStatus::CAPTURED()->toString());
        $this->assertSame('expired', ResponseStatus::EXPIRED()->toString());
        $this->assertSame('pending', ResponseStatus::PENDING()->toString());
        $this->assertSame('refunded', ResponseStatus::REFUNDED()->toString());
        $this->assertSame('undefined', ResponseStatus::UNDEFINED()->toString());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid response status invalid
     */
    public function itDoesNotRepresentAnythingElse()
    {
        new ResponseStatus('invalid');
    }

    /**
     * @test
     */
    public function itGivesAllStatusesAsObject()
    {
        $allStatuses = ResponseStatus::all();

        $expectedStatuses = [
            ResponseStatus::AUTHORIZED(),
            ResponseStatus::CANCELLED(),
            ResponseStatus::CAPTURED(),
            ResponseStatus::EXPIRED(),
            ResponseStatus::PENDING(),
            ResponseStatus::REFUNDED(),
            ResponseStatus::UNDEFINED(),
        ];

        foreach ($allStatuses as $key => $status) {
            $this->assertTrue($status->equals($expectedStatuses[$key]));
        }
    }

    /**
     * @test
     */
    public function itGivesAllStatusesAsString()
    {
        $allStatuses = ResponseStatus::allAsString();

        $expectedStatuses = [
            'authorized',
            'cancelled',
            'captured',
            'expired',
            'pending',
            'refunded',
            'undefined',
        ];

        foreach ($allStatuses as $key => $status) {
            $this->assertEquals($expectedStatuses[$key], $status);
        }
    }

    /**
     * @test
     */
    public function itEqualsAnother()
    {
        $status = ResponseStatus::AUTHORIZED();

        $this->assertTrue($status->equals(ResponseStatus::AUTHORIZED()));
    }

    /**
     * @test
     */
    public function itDoesNotEqualSomethingElse()
    {
        $status = ResponseStatus::AUTHORIZED();

        $this->assertFalse($status->equals(ResponseStatus::CANCELLED()));
        $this->assertFalse($status->equals(new \stdClass()));
        $this->assertFalse($status->equals('some string'));
    }
}
