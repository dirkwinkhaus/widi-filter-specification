<?php

namespace Widi\Filter\Specification\Factory;

use Widi\Filter\Specification\CompositeSpecificationBuilder;
use Widi\Filter\Specification\CompositeSpecificationBuilderInterface;
use Widi\Filter\Specification\Operator\SpecificationFactory;
use Widi\Filter\Specification\SpecificationInterface;

readonly class BuilderFactory
{
    public function __invoke(SpecificationInterface $specification = null): CompositeSpecificationBuilderInterface
    {
        return $this->create($specification);
    }

    public function create(SpecificationInterface $specification = null): CompositeSpecificationBuilderInterface
    {
        return new CompositeSpecificationBuilder(
            new SpecificationFactory(),
            $specification
        );
    }
}
