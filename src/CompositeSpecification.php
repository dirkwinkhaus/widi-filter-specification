<?php

namespace Widi\Filter\Specification;

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
     * @var BuilderInterface
     */
    private $builder;

    /**
     * CompositeSpecification constructor.
     *
     * @param BuilderInterface $builder
     * @param SpecificationInterface|null $specification
     */
    public function __construct(
        BuilderInterface $builder,
        SpecificationInterface $specification = null
    )
    {
        $this->specification = $specification;
        $this->builder = $builder;
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
            $this->specification = $this->builder->createAndNotSpecification($this->specification, $specification);
        }

        return $this;
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function and (SpecificationInterface $specification)
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = $this->builder->createAndSpecification($this->specification, $specification);
        }

        return $this;
    }

    /**
     * @return CompositeSpecificationInterface
     */
    public function not()
    {
        $this->specification = $this->builder->createNotSpecification($this->specification);

        return $this;
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function or (SpecificationInterface $specification)
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = $this->builder->createOrSpecification($this->specification, $specification);
        }

        return $this;
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function xor (SpecificationInterface $specification)
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = $this->builder->createXorSpecification($this->specification, $specification);
        }

        return $this;
    }
}