<?php

include 'autoloader.php';

$discountcalculator = new DiscountCalculator();
echo $discountcalculator->apply(130) . "\n";