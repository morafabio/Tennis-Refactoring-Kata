<?php

class PlayersTest extends \PHPUnit_Framework_TestCase
{
    public function testICanAddAPlayer()
    {
        $playerOne = new \TennisGame\Player('Fabio');
        $players = new \TennisGame\Players();
        $players->add($playerOne);

        $this->assertEquals($players->getPlayers(), [$playerOne]);
    }

    public function testICanGetAPlayerByNameAndId()
    {
        $playerOne = new \TennisGame\Player('Fabio');
        $players = new \TennisGame\Players();
        $players->add($playerOne);

        $this->assertEquals($players->getPlayer('Fabio'), $playerOne);
        $this->assertEquals($players->getPlayer(0), $playerOne);
    }

    public function testICanGetLeadingPlayer()
    {
        $playerOne = new \TennisGame\Player('Fabio', 100);
        $playerTwo = new \TennisGame\Player('Roger Federer', 4);

        $players = new \TennisGame\Players();
        $players->add($playerOne);
        $players->add($playerTwo);

        $this->assertEquals($players->getLeader(), $playerOne);
    }
}

