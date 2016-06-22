<?php

namespace League\Omnipay\Common\Message;

final class ResponseStatus
{
    const AUTHORIZED = 'authorized';
    const CANCELLED  = 'cancelled';
    const CAPTURED   = 'captured';
    const EXPIRED    = 'expired';
    const PENDING    = 'pending';
    const REFUNDED   = 'refunded';
    const UNDEFINED  = 'undefined';

    /**
     * @var string
     */
    private $status;

    /**
     * @return ResponseStatus
     */
    public static function AUTHORIZED()
    {
        return new self(self::AUTHORIZED);
    }

    /**
     * @return ResponseStatus
     */
    public static function CANCELLED()
    {
        return new self(self::CANCELLED);
    }

    /**
     * @return ResponseStatus
     */
    public static function CAPTURED()
    {
        return new self(self::CAPTURED);
    }

    /**
     * @return ResponseStatus
     */
    public static function EXPIRED()
    {
        return new self(self::EXPIRED);
    }

    /**
     * @return ResponseStatus
     */
    public static function PENDING()
    {
        return new self(self::PENDING);
    }

    /**
     * @return ResponseStatus
     */
    public static function REFUNDED()
    {
        return new self(self::REFUNDED);
    }

    /**
     * @return ResponseStatus
     */
    public static function UNDEFINED()
    {
        return new self(self::UNDEFINED);
    }

    /**
     * @return ResponseStatus[]
     */
    public static function all()
    {
        return [
            self::AUTHORIZED(),
            self::CANCELLED(),
            self::CAPTURED(),
            self::EXPIRED(),
            self::PENDING(),
            self::REFUNDED(),
            self::UNDEFINED(),
        ];
    }

    /**
     * @return string[]
     */
    public static function allAsString()
    {
        $statuses = [
            self::AUTHORIZED,
            self::CANCELLED,
            self::CAPTURED,
            self::EXPIRED,
            self::PENDING,
            self::REFUNDED,
            self::UNDEFINED,
        ];

        return $statuses;
    }

    /**
     * @param string $status
     */
    public function __construct($status)
    {
        $this->status = $status;

        $this->protect();
    }

    /**
     * @param mixed $other
     *
     * @return bool
     */
    public function equals($other)
    {
        return $other == $this;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    private function protect()
    {
        if (!in_array($this->status, $this->allAsString(), true)) {
            throw new \InvalidArgumentException(sprintf('Invalid response status %s', $this->status));
        }
    }
}
