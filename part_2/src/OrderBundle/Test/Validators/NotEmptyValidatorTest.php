<?php

namespace OrderBundle\Test\Validators;

use PHPUnit\Framework\TestCase;
use OrderBundle\Validators\NotEmptyValidator;

class NotEmptyValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult) 
    {
        $notEmptyValidator = new NotEmptyValidator($value);
        $isValid = $notEmptyValidator->isValid();

        $this->assertEquals($isValid, $expectedResult);
    }

    public static function valueProvider()
    {
        return [
            'testShouldNotBeValidWhenValueIsEmpty' => ['value' => '', 'expectedResult' => false],
            'testShouldBeValidWhenValueIsNotEmpty' => ['value' => 'foo', 'expectedResult' => true],
        ];
    }
}
