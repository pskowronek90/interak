<?php


class Numbers
{

    public $numbers = [];

    /**
     * @return array
     */
    public function getNumbers(): array
    {
        return $this->numbers;
    }

    /**
     * @param array $numbers
     */
    public function setNumbers(array $numbers)
    {
        $this->numbers = $numbers;
    }

    public function findSingle()
    {
        $numbers = array_map('strval', $this->getNumbers());
        $duplicates = [];
        $uniqueNumbers = [];

        foreach (array_count_values($numbers) as $key => $value) {
            if ($value > 1) {
                $duplicates[] = $key;
            } else {
                $uniqueNumbers[] = $key;
            }
        }

        return print_r($uniqueNumbers);
    }
}

// Test

$test = new Numbers();
$test->setNumbers([11, 21, 33, 18, 21, 18, 33.11]);
echo $test->findSingle();