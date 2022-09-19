<?php

class pushswap{

    function __construct($la){
        $this->la = $la;
        $this->lb = [];
        $this->string = "";
    }

    public function sa(){
        $compteur = count($this->la);
        if($compteur >= 2){
            $varEchange = $this->la[0];
            $this->la[0] = $this->la[1];
            $this->la[1] = $varEchange;
            $this->string .= "sa ";
            $this->algo();
        }
    }
/* 
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
 */
    public function pa(){
        $compteur = count($this->lb);
        if($compteur >= 1){
            $this->la = array_reverse($this->la);
            $this->la[] = $this->lb[0];
            $this->la = array_reverse($this->la);
            array_shift($this->lb);
            $this->string .= "pa ";
            $this->algo();
        }
    }

    public function pb(){
        $compteur = count($this->la);
        if($compteur >= 1){
            $this->lb = array_reverse($this->lb);
            $this->lb[] = $this->la[0];
            $this->lb = array_reverse($this->lb);
            array_shift($this->la);
            $this->string .= "pb ";
            $this->algo();
        }
    }
/* 
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
 */
    public function algo(){
        $check = $this->check();
        if(isset($this->la[0]) && isset($this->la[1])){
            if($check == true){
                $this->pa();
            }
            else{
                if($this->la[0] < $this->la[1]){
                    $this->pb();
                }
                else{
                    $this->sa();
                }
            }
        }
    }

    public function check(){
        $sort = $this->la;
        sort($sort);
        if($sort == $this->la){
            return true;
        }
        else{
            return false;
        }
    }

    function __destruct(){
        echo substr($this->string, 0, -1);
        echo PHP_EOL;
        //var_dump($this->la);
    }

}

array_shift($argv);
$la = $argv;

$exec = new pushswap($la);
$exec->algo();