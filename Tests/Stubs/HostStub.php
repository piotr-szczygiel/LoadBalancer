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
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $increaseLoadBy;

    /**
     * HostStub constructor.
     *
     * @param string $name
     * @param int $load
     * @param int $increaseLoadBy
     */
    public function __construct($name, $load, $increaseLoadBy = 50)
    {
        $this->name = $name;
        $this->load = $load;
        $this->increaseLoadBy = $increaseLoadBy;
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
        /** @var RequestStub $request */
        $request->nameOfHostThatHandledThisRequest = $this->name;
        $this->increaseLoad();
    }

    /**
     * Method increases the load by
     */
    private function increaseLoad()
    {
        $this->load += $this->increaseLoadBy;
    }
}