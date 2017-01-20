<?php
namespace LoadBalancer\Tests\Stubs;

use LoadBalancer\Host\HostInterface;
use LoadBalancer\Http\RequestInterface;

/**
 * Class HostStub
 * @package LoadBalancer\Tests\Stubs
 */
class HostStub implements HostInterface
{
    /**
     * @var int
     */
    private $load;

    /**
     * Sets load.
     *
     * @param int $load
     * @return $this
     */
    public function setLoad($load)
    {
        $this->load = $load;
        return $this;
    }

    /**
     * Returns current load of the host
     *
     * @return int
     */
    public function getLoad()
    {
        return $this->load;
    }

    /**
     * Handles given request
     *
     * @param RequestInterface $request
     * @return void
     */
    public function handleRequest(RequestInterface $request)
    {
        echo 'Request handled.';
    }
}