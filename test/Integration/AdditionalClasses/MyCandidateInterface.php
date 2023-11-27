<?php

namespace Widi\Filter\Specification\AdditionalClasses;

use Widi\Filter\Specification\CandidateInterface;

interface MyCandidateInterface extends CandidateInterface
{
    public function getValue(): int;
}
