<?php

namespace App\Services;

class AiSingleton
{
    private int $count;
    private string $something;

    public function __construct($something) {
        $this->something = $something;
        $this->count  = 0;
    }

    public function getCount(): int {
        return $this->count;
    }

    public function incrementCount(): void {
        dump('current Count', $this->count);
        $this->count++;
    }
}
