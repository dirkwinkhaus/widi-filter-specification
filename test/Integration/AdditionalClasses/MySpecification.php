<?php

namespace Widi\Filter\Specification\AdditionalClasses;

use Widi\Filter\Specification\CandidateInterface;

/**
 * Class MySpecification
 * @package Widi\Filter\Specification\AdditionalClasses
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
interface MySpecification extends CandidateInterface
{
    /**
     * @return int
     */
    public function getValue();
}