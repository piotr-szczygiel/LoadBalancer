<?php
namespace LoadBalancer;

use LoadBalancer\Exception\LoadBalancerException;
use LoadBalancer\Host\HostInterface;
use LoadBalancer\Http\RequestInterface;
use LoadBalancer\LoadVariant\VariantFactory;

/**
 * Class LoadBalancer
 * @package LoadBalancer
 */
class LoadBalancer implements LoadBalancerInterface
{
    /**
     * @var HostInterface[]
     */
    private $hosts;

    /**
     * @var string
     */
    private $variantType;

    /**
     * LoadBalancer constructor.
     *
     * @param HostInterface[] $hosts
     * @param string $variantType - enum value from VariantType class
     */
    public function __construct(array $hosts, $variantType)
    {
        $this->hosts = $hosts;
        $this->variantType = $variantType;
    }

    /**
     * Handles given request
     *
     * @throws LoadBalancerException
     *
     * @param RequestInterface $request
     * @return void
     */
    public function handleRequest(RequestInterface $request)
    {
        try {
            $variant = VariantFactory::createVariant($this->variantType);
            $variant->balanceRequest($request, $this->hosts);
        }
        catch (\Exception $e) {
            throw new LoadBalancerException($e->getMessage(), $e->getCode());
        }
    }
}