<?php

namespace Widi\Filter\Specification\Operator;

use Widi\Filter\Specification\CandidateInterface;
use Widi\Filter\Specification\SpecificationInterface;

readonly class NotSpecification implements SpecificationInterface
{
    public function __construct(
        private SpecificationInterface $specificationA
    ) {
    }

    public function meetsSpecification(CandidateInterface $candidate): bool
    {
        return !$this->specificationA->meetsSpecification($candidate);
    }
}
