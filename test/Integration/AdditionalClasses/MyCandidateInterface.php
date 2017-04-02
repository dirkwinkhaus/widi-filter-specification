<?php

namespace Widi\Filter\Specification\AdditionalClasses;

use Widi\Filter\Specification\CandidateInterface;

/**
 * Interface MyCandidate
 * @package Widi\Filter\Specification\AdditionalClasses
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
interface MyCandidateInterface extends CandidateInterface
{
    /**
     * @return int
     */
    public function getValue();
}