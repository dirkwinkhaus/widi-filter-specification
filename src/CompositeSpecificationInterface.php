<?php

namespace Widi\Filter\Specification;

/**
 * Class AbstractCompositeSpecification
 * @package Widi\Filter\Specification
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
interface CompositeSpecificationInterface extends SpecificationInterface
{
    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function andNot(SpecificationInterface $specification);

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function and(SpecificationInterface $specification);

    /**
     * @return CompositeSpecificationInterface
     */
    public function not();

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function or(SpecificationInterface $specification);

    /**
     * @param SpecificationInterface $specification
     *
     * @return CompositeSpecificationInterface
     */
    public function xor(SpecificationInterface $specification);
}