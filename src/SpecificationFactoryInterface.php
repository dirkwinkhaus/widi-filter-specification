<?php

namespace Widi\Filter\Specification;

use Widi\Filter\Specification\Operator\AndNotSpecification;
use Widi\Filter\Specification\Operator\AndSpecification;
use Widi\Filter\Specification\Operator\NotSpecification;
use Widi\Filter\Specification\Operator\OrSpecification;
use Widi\Filter\Specification\Operator\XorSpecification;

interface SpecificationFactoryInterface
{
    public function createAndSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface;

    public function createOrSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface;

    public function createXorSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface;

    public function createAndNotSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface;

    public function createNotSpecification(
        SpecificationInterface $specificationA
    ): SpecificationInterface;
}
