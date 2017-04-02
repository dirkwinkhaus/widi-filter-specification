<?php

namespace Widi\Filter\Specification;
use Widi\Filter\Specification\Operator\AndNotSpecification;
use Widi\Filter\Specification\Operator\AndSpecification;
use Widi\Filter\Specification\Operator\NotSpecification;
use Widi\Filter\Specification\Operator\OrSpecification;
use Widi\Filter\Specification\Operator\XorSpecification;

/**
 * Class Builder
 * @package Widi\Filter\Specification\Operator
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
interface BuilderInterface
{
    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     * @return AndSpecification
     */
    public function createAndSpecification(SpecificationInterface $specificationA, SpecificationInterface $specificationB);

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     * @return OrSpecification
     */
    public function createOrSpecification(SpecificationInterface $specificationA, SpecificationInterface $specificationB);

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     * @return XorSpecification
     */
    public function createXorSpecification(SpecificationInterface $specificationA, SpecificationInterface $specificationB);

    /**
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     * @return AndNotSpecification
     */
    public function createAndNotSpecification(SpecificationInterface $specificationA, SpecificationInterface $specificationB);

    /**
     * @param SpecificationInterface $specificationA
     * @return NotSpecification
     */
    public function createNotSpecification(SpecificationInterface $specificationA);
}