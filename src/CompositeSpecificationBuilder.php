<?php

namespace Widi\Filter\Specification;

final class CompositeSpecificationBuilder implements CompositeSpecificationBuilderInterface
{
    public function __construct(
        private readonly SpecificationFactoryInterface $specificationFactory,
        private ?SpecificationInterface $specification = null
    ) {
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

    public function and(SpecificationInterface $specification): CompositeSpecificationBuilderInterface
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
        if ($this->specification === null) {
            return $this;
        }

        $this->specification = $this->specificationFactory->createNotSpecification($this->specification);

        return $this;
    }

    public function or(SpecificationInterface $specification): CompositeSpecificationBuilderInterface
    {
        if ($this->specification === null) {
            $this->specification = $specification;
        } else {
            $this->specification = $this->specificationFactory->createOrSpecification($this->specification, $specification);
        }

        return $this;
    }

    public function xor(SpecificationInterface $specification): CompositeSpecificationBuilderInterface
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
        if ($this->specification === null) {
            return null;
        }

        $specification       = clone $this->specification;
        $this->specification = null;

        return $specification;
    }
}
