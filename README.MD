# Widi\Filter\Specification
## Code Sample From Test
```
    $candidate = $this->prophesize(MyCandidateInterface::class);
    $candidate->getValue()->willReturn($value);

    $builderFactory = new BuilderFactory();

    $specificationBuilder = $builderFactory->create();
    $firstSpecification   =
        $specificationBuilder
            ->and(new CandidateIsHigherThanFiveCompositeSpecification())
            ->and(new CandidateIsLowerThanTwentyCompositeSpecification())
            ->or(new CandidateIsDivisableByFive())
            ->build();

    $secondSpecification =
        $specificationBuilder
            ->and(new CandidateIsHigherThanOneHundredCompositeSpecification())
            ->and(new CandidateIsLowerThanTwoHundredCompositeSpecification())
            ->build();

    $compositeSpecification =
        $specificationBuilder
            ->or($firstSpecification)
            ->or($secondSpecification)
            ->build();

    $result = $compositeSpecification->meetsSpecification($candidate->reveal());

    $this->assertEquals($expectedResult, $result, 'Value failed: ' . $value);
```