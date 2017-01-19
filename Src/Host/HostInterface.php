<?php
namespace LoadBalancer\Host;

use LoadBalancer\Http\RequestInterface;

/**
 * Interface HostInterface
 * @package LoadBalancer\Host
 */
interface HostInterface
{
    /**
     * Returns current load of the host
     *
     * @return int
     */
    public function getLoad();

    /**
     * Handles given request
     *
     * @param RequestInterface $request
     * @return void
     */
    public function handleRequest(RequestInterface $request);
}