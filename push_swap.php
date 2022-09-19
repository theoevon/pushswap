<?php

class pushswap{

    function __construct($la){
        $this->la = $la;
        $this->lb = [];
    }

    public function sa(){
        $compteur = count($this->la);
        if($compteur >= 2){
            $varEchange = $this->la[0];
            $this->la[0] = $this->la[1];
            $this->la[1] = $varEchange;
        }
    }

    public function sb(){
        $compteur = count($this->lb);
        if($compteur >= 2){
            $varEchange = $this->lb[0];
            $this->lb[0] = $this->lb[1];
            $this->lb[1] = $varEchange;
        }
    }

    public function sc(){
        $this->sa();
        $this->sb();
    }

    public function pa(){
        $compteur = count($this->lb);
        if($compteur >= 1){
            $this->la = array_reverse($this->la);
            $this->la[] = $this->lb[0];
            $this->la = array_reverse($this->la);
        }
    }

    public function pb(){
        $compteur = count($this->la);
        if($compteur >= 1){
            $this->lb = array_reverse($this->lb);
            $this->lb[] = $this->la[0];
            $this->lb = array_reverse($this->lb);
        }
    }

    public function ra(){
        $first_elem = array_shift($this->la);
        $this->la[] = $first_elem;
    }

    public function rb(){
        $first_elem = array_shift($this->lb);
        $this->lb[] = $first_elem;
    }

    public function rr(){
        $this->ra();
        $this->rb();
    }

    public function rra(){
        $this->la = array_reverse($this->la);
        $last_elem = array_shift($this->la);
        $this->la[] = $last_elem;
        $this->la = array_reverse($this->la);
    }

    public function rrb(){
        $this->lb = array_reverse($this->lb);
        $last_elem = array_shift($this->lb);
        $this->lb[] = $last_elem;
        $this->lb = array_reverse($this->lb);
    }

    public function rrr(){
        $this->rra();
        $this->rrb();
    }

}

array_shift($argv);
$la = $argv;

$exec = new pushswap($la);
$exec->rra();