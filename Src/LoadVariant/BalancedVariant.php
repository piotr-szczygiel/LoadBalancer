<?php
namespace LoadBalancer\LoadVariant;

use LoadBalancer\Host\HostInterface;
use LoadBalancer\Http\RequestInterface;

/**
 * Class BalancedVariant
 * @package LoadBalancer\LoadVariant
 */
class BalancedVariant implements LoadVariantInterface
{
    /**
     * Assigns given request into proper host.
     *
     * @param RequestInterface $request
     * @param HostInterface[] $hosts
     * @return mixed
     */
    public function balanceRequest(RequestInterface $request, array $hosts)
    {
        // TODO: Implement balanceRequest() method.
    }
}