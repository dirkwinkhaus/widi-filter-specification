<?php

namespace Widi\Filter\Specification;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use Widi\Filter\Specification\AdditionalClasses\CandidateIsDividableByFive;
use Widi\Filter\Specification\AdditionalClasses\CandidateIsHigherThanFiveCompositeSpecification;
use Widi\Filter\Specification\AdditionalClasses\CandidateIsHigherThanOneHundredCompositeSpecification;
use Widi\Filter\Specification\AdditionalClasses\CandidateIsLowerThanTwentyCompositeSpecification;
use Widi\Filter\Specification\AdditionalClasses\CandidateIsLowerThanTwoHundredCompositeSpecification;
use Widi\Filter\Specification\AdditionalClasses\MyCandidateInterface;
use Widi\Filter\Specification\Factory\BuilderFactory;

class SpecificationTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @test
     *
     * @dataProvider getDataForOneComposite
     */
    public function itShouldFilterByOneComposite(int $value, bool $expectedResult): void
    {
        $candidate = $this->createCandidate($value);

        $builderFactory = new BuilderFactory();

        $specificationBuilder = $builderFactory->create();
        $specification        =
            $specificationBuilder
                ->and(new CandidateIsHigherThanFiveCompositeSpecification())
                ->and(new CandidateIsLowerThanTwentyCompositeSpecification())
                ->or(new CandidateIsDividableByFive())
                ->build();

        self::assertInstanceOf(SpecificationInterface::class, $specification);

        $result = $specification->meetsSpecification($candidate);

        self::assertEquals($expectedResult, $result, 'Value failed: ' . $value);
    }

    /**
     * @test
     * @dataProvider getDataForTwoComposites
     */

    public function itShouldFilterByTwoComposites(int $value, bool $expectedResult): void
    {
        $candidate = $this->createCandidate($value);

        $builderFactory = new BuilderFactory();

        $specificationBuilder = $builderFactory->create();
        $firstSpecification   =
            $specificationBuilder
                ->and(new CandidateIsHigherThanFiveCompositeSpecification())
                ->and(new CandidateIsLowerThanTwentyCompositeSpecification())
                ->or(new CandidateIsDividableByFive())
                ->build();

        self::assertInstanceOf(SpecificationInterface::class, $firstSpecification);

        $secondSpecification =
            $specificationBuilder
                ->and(new CandidateIsHigherThanOneHundredCompositeSpecification())
                ->and(new CandidateIsLowerThanTwoHundredCompositeSpecification())
                ->build();

        self::assertInstanceOf(SpecificationInterface::class, $secondSpecification);

        $compositeSpecification =
            $specificationBuilder
                ->or($firstSpecification)
                ->or($secondSpecification)
                ->build();

        self::assertInstanceOf(SpecificationInterface::class, $compositeSpecification);

        $result = $compositeSpecification->meetsSpecification($candidate);

        self::assertEquals($expectedResult, $result, 'Value failed: ' . $value);
    }

    /**
     * @return array<array<int, int|bool>>
     */
    public function getDataForOneComposite(): array
    {
        return [
            [
                0,
                true,
            ],
            [
                1,
                false,
            ],
            [
                2,
                false,
            ],
            [
                3,
                false,
            ],
            [
                4,
                false,
            ],
            [
                5,
                true,
            ],
            [
                6,
                true,
            ],
            [
                7,
                true,
            ],
            [
                8,
                true,
            ],
            [
                9,
                true,
            ],
            [
                10,
                true,
            ],
            [
                11,
                true,
            ],
            [
                12,
                true,
            ],
            [
                13,
                true,
            ],
            [
                14,
                true,
            ],
            [
                15,
                true,
            ],
            [
                16,
                true,
            ],
            [
                17,
                true,
            ],
            [
                18,
                true,
            ],
            [
                19,
                true,
            ],
            [
                20,
                true,
            ],
            [
                21,
                false,
            ],
            [
                22,
                false,
            ],
            [
                23,
                false,
            ],
            [
                24,
                false,
            ],
            [
                25,
                true,
            ],
            [
                26,
                false,
            ],
            [
                27,
                false,
            ],
            [
                28,
                false,
            ],
            [
                29,
                false,
            ],
            [
                30,
                true,
            ],
        ];
    }

    /**
     * @return array<array<int, int|bool>>
     */
    public function getDataForTwoComposites(): array
    {
        return array_merge(
            $this->getDataForOneComposite(),
            [
                [
                    101,
                    true,
                ],
                [
                    99,
                    false,
                ],
                [
                    201,
                    false,
                ],
                [
                    98,
                    false,
                ],
                [
                    77,
                    false,
                ],
                [
                    102,
                    true,
                ],
                [
                    188,
                    true,
                ],
                [
                    155,
                    true,
                ],
                [
                    233,
                    false,
                ],
                [
                    500,
                    true,
                ],
            ]
        );
    }

    private function createCandidate(int $value): MyCandidateInterface
    {
        return new class ($value) implements MyCandidateInterface {
            public function __construct(private int $value)
            {

            }

            public function getValue(): int
            {
                return $this->value;
            }
        };
    }
}
