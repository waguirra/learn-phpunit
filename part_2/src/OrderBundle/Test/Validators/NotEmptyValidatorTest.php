<?php

namespace OrderBundle\Test\Validators;

use PHPUnit\Framework\TestCase;
use OrderBundle\Validators\NotEmptyValidator;

class NotEmptyValidatorTest extends TestCase
{
    public function testShouldNotBeValidWhenValueIsEmpty()
    {
        $emptyValue = "";
        $notEmptyValidator = new NotEmptyValidator($emptyValue);

        $isValid = $notEmptyValidator->isValid();

        $this->assertFalse($isValid);
    }

    public function testShouldBeValidWhenValueIsNotEmpty()
    {
        $emptyValue = "foo";
        $notEmptyValidator = new NotEmptyValidator($emptyValue);

        $isValid = $notEmptyValidator->isValid();

        $this->assertTrue($isValid);
    }
}
