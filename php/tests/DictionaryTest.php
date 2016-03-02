<?php

class DictionaryTest extends \PHPUnit_Framework_TestCase
{
    public function testICanGetAStringOrReturnEmptyString()
    {
        $dictionary = new \TennisGame\Dictionary(['context' => ['key' => 'value']]);

        $this->assertEquals($dictionary->get('context', 'key'), 'value');
        $this->assertEquals($dictionary->get('context', '404'), '');
    }
}

