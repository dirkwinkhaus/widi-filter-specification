<?php

namespace Widi\Filter\Specification\AdditionalClasses;

use Widi\Filter\Specification\CandidateInterface;
use Widi\Filter\Specification\SpecificationInterface;

/**
 * Class CandidateIsLowerThanTwentySpecification
 * @package Widi\Filter\Specification\AdditionalClasses
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
class CandidateIsLowerThanTwentyCompositeSpecification implements SpecificationInterface
{

    /**
     * @param CandidateInterface $candidate
     * @return bool
     */
    public function meetsSpecification(CandidateInterface $candidate)
    {
        /** @var MyCandidateInterface $candidate */
        return ($candidate->getValue() < 20);
    }
}