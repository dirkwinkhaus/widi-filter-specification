<?php

namespace Widi\Filter\Specification;

interface SpecificationInterface
{
    public function meetsSpecification(CandidateInterface $candidate): bool;
}
