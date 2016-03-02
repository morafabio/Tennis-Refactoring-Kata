<?php

namespace TennisGame\Match;

use TennisGame\Dictionary;
use TennisGame\Players;
use TennisGame\Player;

class SingleScoreMatch implements MatchInterface
{
    const PLAYER_ONE = 0;
    const PLAYER_TWO = 1;

    /**
     * @var Players
     */
    protected $players;

    /**
     * @var Dictionary
     */
    protected $dictionary;

    /**
     * @param Players $players
     * @param Dictionary|null $dictionary
     */
    public function __construct(Players $players, Dictionary $dictionary = null)
    {
        $this->players = $players;
        $this->dictionary = $dictionary ? $dictionary : Dictionary::build('english');
    }

    /**
     * @inheritdoc
     */
    public function getScore()
    {
        $playerOne = $this->players->getPlayer(self::PLAYER_ONE);
        $playerTwo = $this->players->getPlayer(self::PLAYER_TWO);

        if ($this->arePlayersEqual($playerOne, $playerTwo)) {
            return $this->dictionary->get('equal', $playerOne->getScore()) ?: $this->dictionary->get('equal', 'deuce');
        }

        if ($this->onePlayerIsInAdvantage($playerOne, $playerTwo)) {
            $advantage = abs($playerOne->getScore() - $playerTwo->getScore());
            if ($advantage === 1) {
                return sprintf(
                    $this->dictionary->get('advantage', 'one-point'),
                    $this->players->getLeader()->getName()
                );
            }
            return sprintf(
                $this->dictionary->get('advantage', 'win'),
                $this->players->getLeader()->getName()
            );
        }

        return sprintf(
            '%s-%s',
            $this->dictionary->get('ongoing', $playerOne->getScore()),
            $this->dictionary->get('ongoing', $playerTwo->getScore())
        );
    }

    /**
     * @param $playerOne
     * @param $playerTwo
     * @return bool
     */
    private function arePlayersEqual(Player $playerOne, Player $playerTwo)
    {
        return ($playerOne->getScore() == $playerTwo->getScore());
    }

    /**
     * @param $playerOne
     * @param $playerTwo
     * @return bool
     */
    private function onePlayerIsInAdvantage(Player $playerOne, Player $playerTwo)
    {
        return ($playerOne->getScore() > 3 || $playerTwo->getScore() > 3);
    }
}
