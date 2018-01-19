<?php

namespace Widi\Filter\Specification;

use Widi\Filter\Specification\Operator\AndNotSpecification;
use Widi\Filter\Specification\Operator\AndSpecification;
use Widi\Filter\Specification\Operator\NotSpecification;
use Widi\Filter\Specification\Operator\OrSpecification;
use Widi\Filter\Specification\Operator\XorSpecification;

/**
 * interface SpecificationFactoryInterface
 * @package Widi\Filter\Specification\Operator
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
interface SpecificationFactoryInterface
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
    ): SpecificationInterface;

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     *
     * @return SpecificationInterface
     */
    public function createOrSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface;

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     *
     * @return SpecificationInterface
     */
    public function createXorSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface;

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     *
     * @return SpecificationInterface
     */
    public function createAndNotSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface;

    /**
     * @param SpecificationInterface $specificationA
     *
     * @return SpecificationInterface
     */
    public function createNotSpecification(
        SpecificationInterface $specificationA
    ): SpecificationInterface;
}