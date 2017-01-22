<?php
namespace LoadBalancer\Tests;

use LoadBalancer\Host\HostInterface;

/**
 * Class LoadBalancerTestCase
 * @package LoadBalancer\Tests
 */
class LoadBalancerTestCase
{
    /**
     * @var HostInterface[]
     */
    public $hosts;

    /**
     * @var array
     */
    public $requestsMapper;

    /**
     * @var string
     */
    public $variantType;

    /**
     * LoadBalancerTestCase constructor.
     *
     * @param string $variantType
     * @param HostInterface[] $hosts
     * @param array $requestsMapper
     */
    public function __construct($variantType, array $hosts, array $requestsMapper)
    {
        $this->hosts = $hosts;
        $this->requestsMapper = $requestsMapper;
        $this->variantType = $variantType;
    }
}