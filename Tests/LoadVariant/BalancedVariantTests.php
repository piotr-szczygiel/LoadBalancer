<?php
namespace LoadBalancer\Tests\LoadVariant;

use LoadBalancer\LoadVariant\BalancedVariant;
use LoadBalancer\Tests\Stubs\RequestStub;

/**
 * Class BalancedVariantTests
 * @package LoadBalancer\Tests\LoadVariant
 */
class BalancedVariantTests extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \LoadBalancer\Exception\VariantException
     */
    public function testEmptyArrayWithHostsShouldThrowException()
    {
        // Given
        $balancedVariant = new BalancedVariant();

        // When & Then
        $balancedVariant->balanceRequest(new RequestStub(), []);
    }
}