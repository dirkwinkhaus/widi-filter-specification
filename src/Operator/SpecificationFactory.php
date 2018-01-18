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
     * @return AndSpecification
     */
    public function createAndSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    )
    {
        return new AndSpecification($specificationA, $specificationB);
    }

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     * @return OrSpecification
     */
    public function createOrSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    )
    {
        return new OrSpecification($specificationA, $specificationB);
    }

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     * @return XorSpecification
     */
    public function createXorSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    )
    {
        return new XorSpecification($specificationA, $specificationB);
    }

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     * @return AndNotSpecification
     */
    public function createAndNotSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    )
    {
        return new AndNotSpecification($specificationA, $specificationB);
    }

    /**
     * @param SpecificationInterface $specificationA
     * @return NotSpecification
     */
    public function createNotSpecification(
        SpecificationInterface $specificationA
    )
    {
        return new NotSpecification($specificationA);
    }
}