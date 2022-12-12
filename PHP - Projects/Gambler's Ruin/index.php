<?php

class Player {
    public function __construct(public string $name, public int $pennies)
    {
        //
    }

    public function givePenny(Player $p2): void
    {
        $p2->pennies--;
        $this->pennies++;
    }

    public function bankrupt(): bool
    {
        return $this->pennies === 0;
    }

    public function bankroll(): int
    {
        return $this->pennies;
    }

    public function odds(Player $p2): string
    {
        return round(1 - ($p2->bankroll() / ($this->bankroll() + $p2->bankroll())), 3) * 100 . '%';
    }
}

class Game {
    protected int $flips = 1;

    public function __construct(protected Player $p1, protected Player $p2)
    {
        //
    }

    public function start()
    {
        echo <<<EOT
            Game Start!
            
            {$this->p1->name} Odds: {$this->p1->odds($this->p2)}
            {$this->p2->name} Odds: {$this->p2->odds($this->p1)}
            
            EOT;

        $this->play();
    }
    
    public function play()
    {
        while (true) {
            if ($this->flip() === 'heads') {
                $this->p2->givePenny($this->p1);
            } else {
                $this->p1->givePenny($this->p2);
            }

            if ($this->p1->bankrupt() || $this->p2->bankrupt()) {
                $this->end();

                return;
            }

            $this->flips++;
        }
    }
    
    public function flip(): string
    {
        return rand(0, 1) ? 'heads' : 'tails';
    }

    public function winner(): Player
    {
       return $this->p1->bankroll() > $this->p2->bankroll() ? $this->p1 : $this->p2;
    }

    public function end(): void
    {
        echo <<<EOT
            
            Game Over.
            
            Winner is: {$this->winner()->name}
            
            {$this->p1->name} Pennies: {$this->p1->bankroll()}
            {$this->p2->name} Pennies: {$this->p2->bankroll()}
            
            Total Flips: {$this->flips}
            
            EOT;
    }
}

$game = new Game(
    new Player('Alpet', 100),
    new Player('Sufjan', 100),
);

$game->start();