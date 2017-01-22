<?php
namespace LoadBalancer\LoadVariant;

use LoadBalancer\Exception\VariantException;
use LoadBalancer\Host\HostInterface;
use LoadBalancer\Http\RequestInterface;

/**
 * Class SequentialVariant
 * @package LoadBalancer\LoadVariant
 */
class SequentialVariant implements LoadVariantInterface
{
    /**
     * Property stores an array index of the Host that was used in previous iteration.
     *
     * @var int
     */
    private $previousHostIndex = -1;

    /**
     * Assigns given request into proper host.
     *
     * @throws VariantException
     *
     * @param RequestInterface $request
     * @param HostInterface[] $hosts
     * @return void
     */
    public function balanceRequest(RequestInterface $request, array $hosts)
    {
        $currentIndex = $this->calculateCurrentIndex(sizeof($hosts));
        if (!isset($hosts[$currentIndex])) {
            throw new VariantException(sprintf('Host with index %d doesn\'t exist.', $currentIndex));
        }

        $hosts[$currentIndex]->handleRequest($request);
        $this->previousHostIndex = $currentIndex;
    }

    /**
     * Calculates an index of the host that will be used in current assigning.
     *
     * @param $hostsCount
     * @return int
     */
    private function calculateCurrentIndex($hostsCount)
    {
        $currentIndex = $this->previousHostIndex + 1;
        if ($currentIndex >= $hostsCount) {
            $currentIndex = 0;
        }

        return $currentIndex;
    }
}