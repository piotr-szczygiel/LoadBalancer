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
    public $requestsAssigning;

    /**
     * @var string
     */
    public $variantType;

    /**
     * LoadBalancerTestCase constructor.
     *
     * @param string $variantType
     * @param HostInterface[] $hosts
     * @param array $requestsAssigning
     */
    public function __construct($variantType, array $hosts, array $requestsAssigning)
    {
        $this->hosts = $hosts;
        $this->requestsAssigning = $requestsAssigning;
        $this->variantType = $variantType;
    }
}