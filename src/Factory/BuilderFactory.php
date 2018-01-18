<?php

namespace Widi\Filter\Specification\Factory;

use Widi\Filter\Specification\CompositeSpecificationBuilder;
use Widi\Filter\Specification\CompositeSpecificationBuilderInterface;
use Widi\Filter\Specification\Operator\SpecificationFactory;
use Widi\Filter\Specification\SpecificationInterface;

/**
 * Class CompositeSpecificationFactory
 * @package Widi\Filter\Specification\Factory
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
class BuilderFactory
{
    /**
     * @param SpecificationInterface|null $specification
     *
     * @return CompositeSpecificationBuilderInterface
     */
    public function __invoke(SpecificationInterface $specification = null)
    {
        return $this->create($specification);
    }

    /**
     * @param SpecificationInterface|null $specification
     *
     * @return CompositeSpecificationBuilderInterface
     */
    public function create(SpecificationInterface $specification = null)
    {
        return new CompositeSpecificationBuilder(
            new SpecificationFactory(),
            $specification
        );
    }
}