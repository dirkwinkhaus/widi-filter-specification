<?php

namespace Widi\Filter\Specification;

/**
 * Class AbstractCompositeSpecification
 * @package Widi\Filter\Specification
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
interface CompositeSpecificationBuilderInterface
{
    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationBuilderInterface
     */
    public function andNot(SpecificationInterface $specification): CompositeSpecificationBuilderInterface;

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationBuilderInterface
     */
    public function and (SpecificationInterface $specification): CompositeSpecificationBuilderInterface;

    /**
     * @return CompositeSpecificationBuilderInterface
     */
    public function not(): CompositeSpecificationBuilderInterface;

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationBuilderInterface
     */
    public function or (SpecificationInterface $specification): CompositeSpecificationBuilderInterface;

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationBuilderInterface
     */
    public function xor (SpecificationInterface $specification): CompositeSpecificationBuilderInterface;

    /**
     * @return null|SpecificationInterface
     */
    public function build(): ?SpecificationInterface;
}