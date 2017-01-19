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
            throw new InvalidVariantTypeException(sprintf('VariantType needs to be a string, but %s given.', get_class($variantType)));
        }

        switch ($variantType) {

            case VariantType::SEQUENTIAL:
                return new SequentialVariant();
                break;

            case VariantType::BALANCED:
                return new BalancedVariant();
                break;

            default:
                throw new NotSupportedVariantTypeException(sprintf('Given variant type "%s" is not supported.', $variantType));
                break;
        }
    }
}