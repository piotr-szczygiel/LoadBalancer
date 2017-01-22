<?php
namespace LoadBalancer\Tests;

use LoadBalancer\LoadBalancer;
use LoadBalancer\LoadVariant\VariantTypeEnum;
use LoadBalancer\Tests\Stubs\HostStub;
use LoadBalancer\Tests\Stubs\RequestStub;

/**
 * Class LoadBalancerTests
 * @package LoadBalancer\Tests
 */
class LoadBalancerTests extends \PHPUnit_Framework_TestCase
{
    /**
     * Test the LoadBalancer.
     * ATTENTION! Test assumes that each request increases host load by 50%.
     *
     * @param LoadBalancerTestCase $testCase
     * @dataProvider loadBalancerTestCases
     */
    public function testSequentialLoadBalancerWorks(LoadBalancerTestCase $testCase)
    {
        // Given
        $loadBalancer = new LoadBalancer($testCase->hosts, $testCase->variantType);
        /** @var RequestStub[] $requests */
        $requests = [];

        // When
        foreach ($testCase->requestsMapper as $requestName => $hostIndex) {

            $request = new RequestStub($requestName);
            $loadBalancer->handleRequest($request);
            $requests[] = $request;
        }

        // Then
        foreach ($requests as $request) {
            $this->assertEquals($testCase->requestsMapper[$request->name], $request->nameOfHostThatHandledThisRequest);
        }
    }

    /**
     * Provides a set of Hosts and rules regarding assigning requests to hosts.
     *
     * @return array
     */
    public function loadBalancerTestCases()
    {
        return [
            [new LoadBalancerTestCase(
                VariantTypeEnum::SEQUENTIAL,
                [new HostStub('H0', 34), new HostStub('H1', 75), new HostStub('H2', 76), new HostStub('H3', 0)],
                ['R0' => 'H0', 'R1' => 'H1', 'R2' => 'H2', 'R3' => 'H3', 'R4' => 'H0', 'R5' => 'H1', 'R6' => 'H2', 'R7' => 'H3', 'R8' => 'H0']
            )],
            [new LoadBalancerTestCase(
                VariantTypeEnum::BALANCED,
                [new HostStub('H0', 34), new HostStub('H1', 75), new HostStub('H2', 76), new HostStub('H3', 0)],
                ['R0' => 'H0', 'R1' => 'H3', 'R2' => 'H3', 'R3' => 'H1', 'R4' => 'H2', 'R5' => 'H0', 'R6' => 'H3', 'R7' => 'H1', 'R8' => 'H2']
            )],
            [new LoadBalancerTestCase(
                VariantTypeEnum::SEQUENTIAL,
                [new HostStub('H0', 74), new HostStub('H1', 60), new HostStub('H2', 50)],
                ['R0' => 'H0', 'R1' => 'H1', 'R2' => 'H2', 'R3' => 'H0']
            )],
            [new LoadBalancerTestCase(
                VariantTypeEnum::BALANCED,
                [new HostStub('H0', 74), new HostStub('H1', 60), new HostStub('H2', 50)],
                ['R0' => 'H0', 'R1' => 'H1', 'R2' => 'H2', 'R3' => 'H2', 'R4' => 'H1', 'R5' => 'H0']
            )],
            [new LoadBalancerTestCase(
                VariantTypeEnum::BALANCED,
                [new HostStub('H0', 75), new HostStub('H1', 76), new HostStub('H2', 74)],
                ['R0' => 'H2', 'R1' => 'H0', 'R2' => 'H1', 'R3' => 'H2']
            )],
            [new LoadBalancerTestCase(
                VariantTypeEnum::SEQUENTIAL,
                [new HostStub('H0', 0), new HostStub('H1', 0)],
                ['R0' => 'H0', 'R1' => 'H1', 'R2' => 'H0']
            )],
            [new LoadBalancerTestCase(
                VariantTypeEnum::BALANCED,
                [new HostStub('H0', 0), new HostStub('H1', 0)],
                ['R0' => 'H0', 'R1' => 'H0', 'R2' => 'H1', 'R3' => 'H1', 'R4' => 'H0', 'R5' => 'H1']
            )],
            [new LoadBalancerTestCase(
                VariantTypeEnum::SEQUENTIAL,
                [new HostStub('H0', 40)],
                ['R0' => 'H0', 'R1' => 'H0', 'R2' => 'H0']
            )],
            [new LoadBalancerTestCase(
                VariantTypeEnum::BALANCED,
                [new HostStub('H0', 40)],
                ['R0' => 'H0', 'R1' => 'H0', 'R2' => 'H0']
            )]
        ];
    }
}