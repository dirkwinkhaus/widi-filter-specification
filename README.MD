# Widi\Filter\Specification
## Code Sample From Test
```
    $candidate = $this->prophesize(MyCandidateInterface::class);
    $candidate->getValue()->willReturn($value);

    $compositeSpecificationFirstCompositeFactory = new CompositeSpecificationFactory();
    $compositeSpecificationFirstComposite = $compositeSpecificationFirstCompositeFactory();

    $compositeSpecificationFirstComposite->and(new CandidateIsHigherThanFiveCompositeSpecification());
    $compositeSpecificationFirstComposite->and(new CandidateIsLowerThanTwentyCompositeSpecification());
    $compositeSpecificationFirstComposite->or(new CandidateIsDivisableByFive());

    $compositeSpecificationSecondComposite = $compositeSpecificationFirstCompositeFactory();
    $compositeSpecificationSecondComposite->and(new CandidateIsHigherThanOneHundredCompositeSpecification());
    $compositeSpecificationSecondComposite->and(new CandidateIsLowerThanTwoHundredCompositeSpecification());

    $compositeSpecification = $compositeSpecificationFirstCompositeFactory();
    $compositeSpecification->or($compositeSpecificationFirstComposite);
    $compositeSpecification->or($compositeSpecificationSecondComposite);

    $result = $compositeSpecification->meetsSpecification($candidate->reveal());
```