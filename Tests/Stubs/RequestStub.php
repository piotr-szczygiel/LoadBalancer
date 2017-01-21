<?php
namespace LoadBalancer\Tests\Stubs;

use LoadBalancer\Http\RequestInterface;

/**
 * Class RequestStub
 * @package LoadBalancer\Tests\Stubs
 */
class RequestStub implements RequestInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $nameOfHostThatHandledThisRequest;

    /**
     * RequestStub constructor.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}