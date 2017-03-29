<?php

namespace Widi\Filter\Specification\AdditionalClasses;

use Widi\Filter\Specification\CompositeSpecification;
use Widi\Filter\Specification\CandidateInterface;

/**
 * Class CandidateIsLowerThanTwoHundredCompositeSpecification
 *
 * @package Widi\Filter\Specification\AdditionalClasses
 * @author  Dirk Winkhaus <dirk.winkhaus@check24.de>
 */
class CandidateIsLowerThanTwoHundredCompositeSpecification extends CompositeSpecification
{

    /**
     * @param CandidateInterface $candidate
     * @return bool
     */
    public function meetsSpecification(CandidateInterface $candidate)
    {
        /** @var MySpecification $candidate */
        return ($candidate->getValue() < 200);
    }
}