<?php

namespace Widi\Filter\Specification;

use PHPUnit\Framework\TestCase;
use Widi\Filter\Specification\AdditionalClasses\CandidateIsDivisableByFive;
use Widi\Filter\Specification\AdditionalClasses\CandidateIsHigherThanFiveCompositeSpecification;
use Widi\Filter\Specification\AdditionalClasses\CandidateIsHigherThanOneHundredCompositeSpecification;
use Widi\Filter\Specification\AdditionalClasses\CandidateIsLowerThanTwentyCompositeSpecification;
use Widi\Filter\Specification\AdditionalClasses\CandidateIsLowerThanTwoHundredCompositeSpecification;
use Widi\Filter\Specification\AdditionalClasses\MyCandidateInterface;
use Widi\Filter\Specification\Factory\CompositeSpecificationFactory;

/**
 * Class SpecificationTest
 * @package Widi\Filter\Specification
 *
 * @author Dirk Winkhaus <dirkwinkhaus@googlemail.com>
 */
class SpecificationTest extends TestCase
{
    /**
     * @test
     *
     * @dataProvider getDataForOneComposite
     */
    public function itShouldFilterByOneComposite($value, $expectedResult)
    {
        $candidate = $this->prophesize(MyCandidateInterface::class);
        $candidate->getValue()->willReturn($value);

        $compositeSpecificationFirstCompositeFactory = new CompositeSpecificationFactory();
        $compositeSpecificationFirstComposite = $compositeSpecificationFirstCompositeFactory();

        $compositeSpecificationFirstComposite->and(new CandidateIsHigherThanFiveCompositeSpecification());
        $compositeSpecificationFirstComposite->and(new CandidateIsLowerThanTwentyCompositeSpecification());
        $compositeSpecificationFirstComposite->or(new CandidateIsDivisableByFive());

        $result = $compositeSpecificationFirstComposite->meetsSpecification($candidate->reveal());

        $this->assertEquals($expectedResult, $result, 'Value failed: ' . $value);
    }

    /**
     * @test
     * @dataProvider getDataForTwoComposites
     */

    public function itShouldFilterByTwoComposites($value, $expectedResult)
    {
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

        $this->assertEquals($expectedResult, $result, 'Value failed: ' . $value);
    }

    /**
     * @return array
     */
    public function getDataForOneComposite()
    {
        return [
            [0, true],
            [1, false],
            [2, false],
            [3, false],
            [4, false],
            [5, true],
            [6, true],
            [7, true],
            [8, true],
            [9, true],
            [10, true],
            [11, true],
            [12, true],
            [13, true],
            [14, true],
            [15, true],
            [16, true],
            [17, true],
            [18, true],
            [19, true],
            [20, true],
            [21, false],
            [22, false],
            [23, false],
            [24, false],
            [25, true],
            [26, false],
            [27, false],
            [28, false],
            [29, false],
            [30, true],
        ];
    }

    /**
     * @return array
     */
    public function getDataForTwoComposites()
    {
        return array_merge(
            $this->getDataForOneComposite(),
            [
                [101, true],
                [99, false],
                [201, false],
                [98, false],
                [77, false],
                [102, true],
                [188, true],
                [155, true],
                [233, false],
                [500, true],
            ]
        );
    }
}