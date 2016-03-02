<?php

namespace TennisGame;

class Players
{
    /** @var Player[] */
    private $players = [];

    /**
     * @param Player $player
     */
    public function add(Player $player)
    {
        $this->players[] = $player;
    }

    /**
     * @return Player[]
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param int|string $index
     * @return Player
     */
    public function getPlayer($index)
    {
        if(array_key_exists($index, $this->players)) {
            return $this->players[$index];
        }
        foreach($this->players as $player) {
            if ($player->getName() == $index)
            {
                return $player;
            }
        }
        throw new \InvalidArgumentException(sprintf('Player %s does not exist.', $index));
    }

    /**
     * @return Player
     */
    public function getLeader()
    {
        $leadPlayer = $this->players[0];
        foreach($this->players as $player)
        {
            if($player->getScore() > $leadPlayer->getScore()) {
                $leadPlayer = $player;
            }
        }
        return $leadPlayer;
    }
}