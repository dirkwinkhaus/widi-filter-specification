<?php


namespace Widi\Filter\Specification\Operator;

use Widi\Filter\Specification\SpecificationFactoryInterface;
use Widi\Filter\Specification\SpecificationInterface;

/**
 * Class Builder
 * @package Widi\Filter\Specification\Operator
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
class SpecificationFactory implements SpecificationFactoryInterface
{
    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     *
     * @return SpecificationInterface
     */
    public function createAndSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface
    {
        return new AndSpecification($specificationA, $specificationB);
    }

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     *
     * @return SpecificationInterface
     */
    public function createOrSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface
    {
        return new OrSpecification($specificationA, $specificationB);
    }

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     *
     * @return SpecificationInterface
     */
    public function createXorSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface
    {
        return new XorSpecification($specificationA, $specificationB);
    }

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     *
     * @return SpecificationInterface
     */
    public function createAndNotSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface
    {
        return new AndNotSpecification($specificationA, $specificationB);
    }

    /**
     * @param SpecificationInterface $specificationA
     *
     * @return SpecificationInterface
     */
    public function createNotSpecification(
        SpecificationInterface $specificationA
    ): SpecificationInterface
    {
        return new NotSpecification($specificationA);
    }
}