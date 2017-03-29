<?php

namespace Widi\Filter\Specification\Operator;

use Widi\Filter\Specification\CandidateInterface;
use Widi\Filter\Specification\SpecificationInterface;

/**
 * Class NotSpecification
 * @package Widi\Filter\Specification\Operator
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
class NotSpecification implements SpecificationInterface
{
    /**
     * @var SpecificationInterface
     */
    private $specificationA;

    /**
     * NotSpecification constructor.
     *
     * @param SpecificationInterface $specificationA
     */
    public function __construct(
        SpecificationInterface $specificationA
    ) {
        $this->specificationA = $specificationA;
    }

    /**
     * @param CandidateInterface $candidate
     * @return bool
     */
    public function meetsSpecification(CandidateInterface $candidate)
    {
        return !$this->specificationA->meetsSpecification($candidate);
    }
}