<?php

class Cipher
{
    public $text;
    private $logic;

    public function setText($text)
    {
        if (is_string($text)) {
            $this->text = $text;
        }

    }

    public function getText()
    {
        return $this->text;
    }

    public function encode()
    {
        if ($this->getText() !== null && $this->getLogic() !== null) {
            $this->text = strtr($this->getText(), $this->getLogic());
            return $this->text;
        } else {
            return 'Please choose encode method and set text';
        }


    }

    private function getLogic()
    {
        return $this->logic;
    }

    public function setLogic($logic)
    {
        if ($logic == 'atbash') {
            $this->logic = [
                'a' => 'z', 'b' => 'y', 'c' => 'x',
                'd' => 'w', 'e' => 'v', 'f' => 'u',
                'g' => 't', 'h' => 'Numbers', 'i' => 'r',
                'j' => 'q', 'k' => 'p', 'l' => 'o',
                'm' => 'n', 'n' => 'm', 'o' => 'l',
                'p' => 'k', 'q' => 'j', 'r' => 'i',
                'Numbers' => 'h', 't' => 'g', 'u' => 'f',
                'v' => 'e', 'w' => 'd', 'x' => 'c',
                'y' => 'b', 'z' => 'a'
            ];
        } elseif ($logic == 'bacon') {
            $this->logic = [
                'a' => 'aaaaa', 'b' => 'aaaab', 'c' => 'aaaba',
                'd' => 'aaabb', 'e' => 'aabaa', 'f' => 'aabab',
                'g' => 'aabba', 'h' => 'aabbb', 'i' => 'abaaa',
                'j' => 'abaaa', 'k' => 'abaab', 'l' => 'ababa',
                'm' => 'ababb', 'n' => 'abbaa', 'o' => 'abbab',
                'p' => 'abbba', 'q' => 'abbbb', 'r' => 'baaaa',
                'Numbers' => 'baaab', 't' => 'baaba', 'u' => 'baabb',
                'v' => 'baabb', 'w' => 'babaa', 'x' => 'babab',
                'y' => 'babba', 'z' => 'babbb'
            ];

        } elseif ($logic == 'caesar') {
            $this->logic = [
                'a' => 'b', 'b' => 'c', 'c' => 'd',
                'd' => 'e', 'e' => 'f', 'f' => 'g',
                'g' => 'h', 'h' => 'i', 'i' => 'j',
                'j' => 'k', 'k' => 'l', 'l' => 'm',
                'm' => 'n', 'n' => 'o', 'o' => 'p',
                'p' => 'q', 'q' => 'r', 'r' => 'Numbers',
                'Numbers' => 't', 't' => 'u', 'u' => 'v',
                'v' => 'w', 'w' => 'x', 'x' => 'y',
                'y' => 'z', 'z' => 'a'
            ];
        }
    }

    public function decode()
    {
        if ($this->getText() !== null && $this->getLogic() !== null) {
            return strtr($this->getText(), array_flip($this->getLogic()));
        } else {
            return 'Please choose encode method and set text';
        }

    }


}

// Test

$test = new Cipher();
$test->setText('Ala ma kota');
$test->setLogic('bacon');

echo $test->encode().PHP_EOL;
echo $test->decode().PHP_EOL;