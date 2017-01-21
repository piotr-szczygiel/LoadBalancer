<?php
namespace LoadBalancer\LoadVariant;

use LoadBalancer\Host\HostInterface;
use LoadBalancer\Http\RequestInterface;

/**
 * Interface VariantInterface
 * @package LoadBalancer\LoadVariant
 */
interface LoadVariantInterface
{
    /**
     * Assigns given request into proper host.
     *
     * @param RequestInterface $request
     * @param HostInterface[] $hosts
     * @return void
     */
    public function balanceRequest(RequestInterface $request, array $hosts);
}