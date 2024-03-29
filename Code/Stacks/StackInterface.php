<?php

namespace Code\Stacks;

interface StackInterface { 

    public function push(string $item); 

    public function pop(); 

    public function top(); 

    public function isEmpty(); 

}

