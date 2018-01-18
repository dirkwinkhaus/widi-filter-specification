<?php

namespace Widi\Filter\Specification;

/**
 * Interface SpecificationInterface
 * @package Widi\Specification
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
interface SpecificationInterface
{
    /**
     * @param CandidateInterface $candidate
     *
     * @return bool
     */
    public function meetsSpecification(CandidateInterface $candidate): bool;
}