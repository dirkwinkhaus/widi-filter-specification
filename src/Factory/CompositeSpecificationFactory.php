<?php

namespace Widi\Filter\Specification\Factory;

use Widi\Filter\Specification\CompositeSpecification;
use Widi\Filter\Specification\Operator\Builder;
use Widi\Filter\Specification\SpecificationInterface;

/**
 * Class CompositeSpecificationFactory
 * @package Widi\Filter\Specification\Factory
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
class CompositeSpecificationFactory
{
    /**
     * @param SpecificationInterface|null $specification
     * @return CompositeSpecification
     */
    public function __invoke(SpecificationInterface $specification = null)
    {
        return new CompositeSpecification(
            new Builder(),
            $specification
        );
    }
}