<?php
namespace LoadBalancer\LoadVariant;

use LoadBalancer\Exception\VariantException;
use LoadBalancer\Host\HostInterface;
use LoadBalancer\Http\RequestInterface;

/**
 * Class BalancedVariant
 * @package LoadBalancer\LoadVariant
 */
class BalancedVariant implements LoadVariantInterface
{
    /**
     * @var int
     */
    const LOAD_LIMIT = 75;

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
        if (sizeof($hosts) === 0) {
            throw new VariantException('Array with hosts cannot be empty.');
        }

        /** @var HostInterface $hostWithLowestLoad */
        $hostWithLowestLoad = null;
        /** @var HostInterface $hostToUse */
        $hostToUse = null;

        foreach ($hosts as $host) {

            if ($host->getLoad() < self::LOAD_LIMIT) {
                $hostToUse = $host;
                break;
            }

            if (is_null($hostWithLowestLoad) || $host->getLoad() < $hostWithLowestLoad->getLoad()) {
                $hostWithLowestLoad = $host;
            }
        }

        if (is_null($hostToUse)) {
            $hostToUse = $hostWithLowestLoad;
        }

        $hostToUse->handleRequest($request);
    }
}