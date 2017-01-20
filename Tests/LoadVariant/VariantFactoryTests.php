<?php
namespace LoadBalancer\Tests\LoadVariant;

use LoadBalancer\LoadVariant\VariantFactory;
use LoadBalancer\LoadVariant\VariantType;

/**
 * Class VariantFactoryTests
 * @package LoadBalancer\Tests\LoadVariant
 */
class VariantFactoryTests extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider correctVariantsProvider
     * @param string $variantType
     */
    public function testCorrectVariants($variantType)
    {
        // Given & When
        $variant = VariantFactory::createVariant($variantType);

        // Then
        $this->assertInstanceOf('LoadBalancer\LoadVariant\LoadVariantInterface', $variant);
    }

    /**
     * @dataProvider incorrectDataTypesOfVariantTypes
     * @param mixed $input
     * @expectedException \LoadBalancer\Exception\InvalidVariantTypeException
     */
    public function testIncorrectDataTypeOfVariantTypeThrowsException($input)
    {
        // Given && When
        VariantFactory::createVariant($input);
    }

    /**
     * @expectedException \LoadBalancer\Exception\NotSupportedVariantTypeException
     */
    public function testNotSupportedVariantTypeThrowsException()
    {
        // Given
        $incorrectType = uniqid();

        // When && Then
        VariantFactory::createVariant($incorrectType);
    }

    /**
     * Provides values of data types that are not supported by the Factory.
     * @return array
     */
    public function incorrectDataTypesOfVariantTypes()
    {
        return [
            [10], [10.4], [null], [new \stdClass()]
        ];
    }

    /**
     * Provides correct variant types.
     * @return array
     */
    public function correctVariantsProvider()
    {
        return [
            [VariantType::BALANCED],
            [VariantType::SEQUENTIAL]
        ];
    }
}