<?php
namespace LoadBalancer;

use LoadBalancer\Exception\LoadBalancerException;
use LoadBalancer\Http\RequestInterface;

/**
 * Interface LoadBalancerInterface
 * @package LoadBalancer
 */
interface LoadBalancerInterface
{
    /**
     * Handles given request
     *
     * @throws LoadBalancerException
     *
     * @param RequestInterface $request
     * @return void
     */
    public function handleRequest(RequestInterface $request);
}