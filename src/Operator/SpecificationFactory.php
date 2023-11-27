<?php

namespace Widi\Filter\Specification\Operator;

use Widi\Filter\Specification\SpecificationFactoryInterface;
use Widi\Filter\Specification\SpecificationInterface;

readonly class SpecificationFactory implements SpecificationFactoryInterface
{
    public function createAndSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface {
        return new AndSpecification($specificationA, $specificationB);
    }

    public function createOrSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface {
        return new OrSpecification($specificationA, $specificationB);
    }

    public function createXorSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface {
        return new XorSpecification($specificationA, $specificationB);
    }

    public function createAndNotSpecification(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ): SpecificationInterface {
        return new AndNotSpecification($specificationA, $specificationB);
    }

    public function createNotSpecification(
        SpecificationInterface $specificationA
    ): SpecificationInterface {
        return new NotSpecification($specificationA);
    }
}
