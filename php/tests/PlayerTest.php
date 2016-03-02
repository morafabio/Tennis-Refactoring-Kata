<?php

class PlayerTest extends \PHPUnit_Framework_TestCase
{
    public function testItCanStoreNameAndScore()
    {
        $player = new \TennisGame\Player('John', 8);
        $this->assertEquals('John', $player->getName());
        $this->assertEquals(8, $player->getScore());
    }

    public function testItCanIncrementScore()
    {
        $player = new \TennisGame\Player('John');
        $this->assertEquals(0, $player->getScore());

        $player->score();
        $this->assertEquals(1, $player->getScore());

        $player->score(5);
        $this->assertEquals(6, $player->getScore());
    }
}

