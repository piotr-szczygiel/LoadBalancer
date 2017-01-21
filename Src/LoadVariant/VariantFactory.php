<?php
namespace LoadBalancer\LoadVariant;

use LoadBalancer\Exception\InvalidVariantTypeException;
use LoadBalancer\Exception\NotSupportedVariantTypeException;

/**
 * Class VariantFactory
 * @package LoadBalancer\LoadVariant
 */
class VariantFactory
{
    /**
     * Creates LoadVariantInterface instance that is adequate to given variant type.
     *
     * @throws InvalidVariantTypeException
     * @throws NotSupportedVariantTypeException
     *
     * @param string $variantType
     * @return LoadVariantInterface
     */
    public static function createVariant($variantType)
    {
        if (!is_string($variantType)) {
            throw new InvalidVariantTypeException(sprintf('VariantType needs to be a string, but %s given.', gettype($variantType)));
        }

        switch ($variantType) {

            case VariantTypeEnum::SEQUENTIAL:
                return new SequentialVariant();
                break;

            case VariantTypeEnum::BALANCED:
                return new BalancedVariant();
                break;

            default:
                throw new NotSupportedVariantTypeException(sprintf('Given variant type "%s" is not supported.', $variantType));
                break;
        }
    }
}