<?php

namespace Widi\Filter\Specification;

/**
 * Class CompositeSpecification
 *
 * @package Widi\Filter\Specification
 *
 * @author  Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
class CompositeSpecificationBuilder implements CompositeSpecificationBuilderInterface
{
    private ?SpecificationInterface $specification;
    private SpecificationFactoryInterface $specificationFactory;

    public function __construct(
        SpecificationFactoryInterface $builder,
        SpecificationInterface $specification = null
    ) {
        $this->specification        = $specification;
        $this->specificationFactory = $builder;
    }

    public function andNot(SpecificationInterface $specification): CompositeSpecificationBuilderInterface
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = $this->specificationFactory->createAndNotSpecification($this->specification, $specification);
        }

        return $this;
    }

    public function and (SpecificationInterface $specification): CompositeSpecificationBuilderInterface
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = $this->specificationFactory->createAndSpecification($this->specification, $specification);
        }

        return $this;
    }

    public function not(): CompositeSpecificationBuilderInterface
    {
        $this->specification = $this->specificationFactory->createNotSpecification($this->specification);

        return $this;
    }

    public function or (SpecificationInterface $specification): CompositeSpecificationBuilderInterface
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = $this->specificationFactory->createOrSpecification($this->specification, $specification);
        }

        return $this;
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationBuilderInterface
     */
    public function xor (SpecificationInterface $specification): CompositeSpecificationBuilderInterface
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = $this->specificationFactory->createXorSpecification($this->specification, $specification);
        }

        return $this;
    }

    public function build(): ?SpecificationInterface
    {
        $specification       = clone $this->specification;
        $this->specification = null;

        return $specification;
    }
}
