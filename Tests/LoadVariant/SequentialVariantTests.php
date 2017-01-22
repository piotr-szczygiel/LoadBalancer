<?php
namespace LoadBalancer\Tests\LoadVariant;

use LoadBalancer\LoadVariant\SequentialVariant;
use LoadBalancer\Tests\Stubs\RequestStub;

/**
 * Class SequentialVariantTests
 * @package LoadBalancer\Tests\LoadVariant
 */
class SequentialVariantTests extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \LoadBalancer\Exception\VariantException
     */
    public function testIncorrectHostIndexShouldThrowException()
    {
        // Given
        $sequentialVariant = new SequentialVariant();

        // When && Then
        $sequentialVariant->balanceRequest(new RequestStub(uniqid()), array());
    }
}