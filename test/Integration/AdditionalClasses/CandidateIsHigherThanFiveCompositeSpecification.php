<?php

namespace Widi\Filter\Specification\AdditionalClasses;

use Widi\Filter\Specification\CompositeSpecification;
use Widi\Filter\Specification\CandidateInterface;

/**
 * Class CandidateIsHigherThanFiveSpecification
 * @package Widi\Filter\Specification\AdditionalClasses
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
class CandidateIsHigherThanFiveCompositeSpecification extends CompositeSpecification
{

    /**
     * @param CandidateInterface $candidate
     * @return bool
     */
    public function meetsSpecification(CandidateInterface $candidate)
    {
        /** @var MySpecification $candidate */
        return ($candidate->getValue() > 5);
    }
}