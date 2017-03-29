<?php

namespace Widi\Filter\Specification\Operator;

use Widi\Filter\Specification\CandidateInterface;
use Widi\Filter\Specification\SpecificationInterface;

/**
 * Class OrSpecification
 * @package Widi\Filter\Specification\Operator
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
class OrSpecification implements SpecificationInterface
{
    /**
     * @var SpecificationInterface
     */
    private $specificationA;

    /**
     * @var SpecificationInterface
     */
    private $specificationB;

    /**
     * AndSpecification constructor.
     * @param SpecificationInterface $specificationA
     * @param SpecificationInterface $specificationB
     */
    public function __construct(
        SpecificationInterface $specificationA,
        SpecificationInterface $specificationB
    ) {
        $this->specificationA = $specificationA;
        $this->specificationB = $specificationB;
    }

    /**
     * @param CandidateInterface $candidate
     * @return bool
     */
    public function meetsSpecification(CandidateInterface $candidate)
    {
        return
            $this->specificationA->meetsSpecification($candidate) === true
            or $this->specificationB->meetsSpecification($candidate) === true;
    }
}