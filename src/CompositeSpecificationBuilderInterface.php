<?php

namespace Widi\Filter\Specification;

interface CompositeSpecificationBuilderInterface
{
    public function andNot(SpecificationInterface $specification): CompositeSpecificationBuilderInterface;
    public function and(SpecificationInterface $specification): CompositeSpecificationBuilderInterface;
    public function not(): CompositeSpecificationBuilderInterface;
    public function or(SpecificationInterface $specification): CompositeSpecificationBuilderInterface;
    public function xor(SpecificationInterface $specification): CompositeSpecificationBuilderInterface;
    public function build(): ?SpecificationInterface;
}
