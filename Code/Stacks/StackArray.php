<?php

namespace Code\Stacks;

class StackArray implements StackInterface
{ 
    /**
     * Max size of the stack
     */
    private $limit; 

    /**
     * Stack as array
     */
    private $stack; 

    public function __construct(int $limit = 20)
    { 
      $this->limit = $limit; 
      $this->stack = []; 
    } 

    /**
     * Remove item from stack
     */
    public function pop(): string
    { 
      if ($this->isEmpty()) { 
          throw new UnderflowException('Stack is empty'); 
      } else { 
          return array_pop($this->stack); 
      } 
    } 

    /**
     * Add item to stack
     */
    public function push(string $newItem)
    {  
        if (count($this->stack) < $this->limit) { 
            array_push($this->stack, $newItem); 
        } else { 
            throw new OverflowException('Stack is full'); 
        } 
    } 

    
    public function top(): string
    { 
      return end($this->stack); 
    } 

    public function isEmpty(): bool
    { 
      return empty($this->stack); 
    } 
}
