<?php

namespace TennisGame;

class Dictionary
{
    /** @var array  */
    protected $dictionary = [];

    /**
     * @param array $dictionary
     */
    public function __construct(array $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    /**
     * @param $context
     * @param $key
     * @return string
     */
    public function get($context, $key)
    {
        if (!isset($this->dictionary[$context][$key])) {
            return '';
        }
        return $this->dictionary[$context][$key];
    }

    /**
     * @param $language
     * @return Dictionary
     */
    public static function build($language)
    {
        $file = sprintf('%s/../config/%s.json', __DIR__, $language);
        $dictionary = json_decode(file_get_contents($file), true);

        return new self($dictionary);
    }
}