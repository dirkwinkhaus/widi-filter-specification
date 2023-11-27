<?php

namespace Widi\Filter\Specification\Operator;

use Widi\Filter\Specification\CandidateInterface;
use Widi\Filter\Specification\SpecificationInterface;

readonly class AndSpecification implements SpecificationInterface
{
    public function __construct(
        private SpecificationInterface $specificationA,
        private SpecificationInterface $specificationB
    ) {
    }

    public function meetsSpecification(CandidateInterface $candidate): bool
    {
        return
            $this->specificationA->meetsSpecification($candidate) === true
            && $this->specificationB->meetsSpecification($candidate) === true;
    }
}
