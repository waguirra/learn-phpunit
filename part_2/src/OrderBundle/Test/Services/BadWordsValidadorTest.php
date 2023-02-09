<?php

namespace OrderBundle\Test\Services;

use OrderBundle\Repository\BadWordsRepository;
use OrderBundle\Service\BadWordsValidator;
use PHPUnit\Framework\TestCase;

class BadWordsValidadorTest extends TestCase
{
    /**
     * @dataProvider badWordsDataProvider
     */
    public function testHasBadWords($badWordsList, $text, $foundBadWords)
    {
        $badWordsRepository = $this->createMock(BadWordsRepository::class);
        $badWordsRepository->method('findAllAsArray')->willReturn($badWordsList);
        
        $badWordsValidador = new BadWordsValidator($badWordsRepository);
        $hasBadWords = $badWordsValidador->hasBadWords($text);

        $this->assertEquals($foundBadWords, $hasBadWords);
    }

    public static function badWordsDataProvider() 
    {
        return [
            'shouldFindWhenHasBadWords' => [
                'badWordsList' => ['bobo'],
                'text' => 'Seu restaurante é muito bobo',
                'foundBadWords' => true
            ],
            'shouldNotFindWhenHasNoBadWords' => [
                'badWordsList' => ['bobo'],
                'text' => 'Seu restaurante é muito',
                'foundBadWords' => false
            ]
        ];
    }
}
