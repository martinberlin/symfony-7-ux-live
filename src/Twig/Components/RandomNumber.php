<?php
// src/Twig/Components/RandomNumber.php
namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveProp;

#[AsLiveComponent]
class RandomNumber
{
    use DefaultActionTrait;

    #[LiveProp(writable:true)]
    public int $max = 100;

    public function getRandomNumber(): int
    {
        return rand(0, $this->max);
    }
}