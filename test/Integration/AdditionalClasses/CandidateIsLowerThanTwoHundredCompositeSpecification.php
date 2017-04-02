<?php

namespace Widi\Filter\Specification\AdditionalClasses;

use Widi\Filter\Specification\CandidateInterface;
use Widi\Filter\Specification\SpecificationInterface;

/**
 * Class CandidateIsLowerThanTwoHundredCompositeSpecification
 *
 * @package Widi\Filter\Specification\AdditionalClasses
 * @author  Dirk Winkhaus <dirk.winkhaus@check24.de>
 */
class CandidateIsLowerThanTwoHundredCompositeSpecification implements SpecificationInterface
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