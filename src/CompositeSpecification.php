<?php

namespace Widi\Filter\Specification;

use Widi\Filter\Specification\Operator\AndNotSpecification;
use Widi\Filter\Specification\Operator\AndSpecification;
use Widi\Filter\Specification\Operator\NotSpecification;
use Widi\Filter\Specification\Operator\OrSpecification;
use Widi\Filter\Specification\Operator\XorSpecification;

/**
 * Class CompositeSpecification
 * @package Widi\Filter\Specification
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
class CompositeSpecification implements CompositeSpecificationInterface
{
    /**
     * @var SpecificationInterface
     */
    private $specification;

    /**
     * CompositeSpecification constructor.
     * 
     * @param SpecificationInterface|null $specification
     */
    public function __construct(SpecificationInterface $specification = null)
    {
        $this->specification = $specification;
    }

    /**
     * @param CandidateInterface $candidate
     *
     * @return bool
     */
    public function meetsSpecification(CandidateInterface $candidate)
    {
        return $this->specification->meetsSpecification($candidate);
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function andNot(SpecificationInterface $specification)
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = new AndNotSpecification($this->specification, $specification);
        }

        return $this;
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function and(SpecificationInterface $specification)
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = new AndSpecification($this->specification, $specification);
        }

        return $this;
    }

    /**
     * @return CompositeSpecificationInterface
     */
    public function not()
    {
        $this->specification = new NotSpecification($this->specification);

        return $this;
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function or(SpecificationInterface $specification)
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = new OrSpecification($this->specification, $specification);
        }

        return $this;
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function xor(SpecificationInterface $specification)
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = new XorSpecification($this->specification, $specification);
        }

        return $this;
    }
}