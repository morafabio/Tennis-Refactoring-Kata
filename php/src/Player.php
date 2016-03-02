<?php

namespace TennisGame;

class Player
{
    /** @var string */
    private $name;

    /** @var int */
    private $score;

    /**
     * @param string $name
     * @param int $score
     */
    public function __construct($name, $score = 0)
    {
        $this->name = (string) $name;
        $this->score = (int) $score;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param int $wonPoints
     */
    public function score($wonPoints = 1)
    {
        $this->score += (int) $wonPoints;
    }
}