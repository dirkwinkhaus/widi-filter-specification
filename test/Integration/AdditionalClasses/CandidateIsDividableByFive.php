<?php

namespace Widi\Filter\Specification\AdditionalClasses;

use Widi\Filter\Specification\CandidateInterface;
use Widi\Filter\Specification\SpecificationInterface;

class CandidateIsDividableByFive implements SpecificationInterface
{
    public function meetsSpecification(CandidateInterface $candidate): bool
    {
        /** @var MyCandidateInterface $candidate */
        return ($candidate->getValue() % 5 === 0);
    }
}
