<?php

use TennisGame\Players;
use TennisGame\Player;
use TennisGame\Match\MatchInterface;

class TennisGame1 implements TennisGame
{
    /** @var Players */
    private $players;

    /** @var MatchInterface */
    private $match;

    /**
     * @param $player1Name
     * @param $player2Name
     * @param Players|null $players
     * @param MatchInterface|null $matchType
     */
    public function __construct($player1Name, $player2Name, Players $players = null, MatchInterface $matchType = null)
    {
        $this->players = $players ? $players : new Players();
        $this->players->add(new Player($player1Name));
        $this->players->add(new Player($player2Name));

        $this->match = $matchType ? $matchType : new \TennisGame\Match\SingleScoreMatch($this->players);
    }

    /**
     * @param $playerName
     */
    public function wonPoint($playerName)
    {
        $this->players->getPlayer($playerName)->score();
    }

    /**
     * @return string
     */
    public function getScore()
    {
        return $this->match->getScore();
    }
}