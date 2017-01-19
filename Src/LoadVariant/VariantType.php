<?php
namespace LoadBalancer\LoadVariant;

/**
 * Class VariantEnum
 * @package LoadBalancer\LoadVariant
 */
abstract class VariantType
{
    /**
     * @var string
     */
    const SEQUENTIAL = 'Sequential';

    /**
     * @string Balanced
     */
    const BALANCED = 'Balanced';
}