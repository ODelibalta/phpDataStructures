<?php

namespace Code\Stacks;

use Code\Lists\LinkedList;

class StackLinkedList implements StackInterface
{ 

    /**
     * Stack linked list
     */
    private $stack; 

    public function __construct()
    { 
      $this->stack = new LinkedList(); 
    }

    public function pop(): string
    {
        if ($this->isEmpty()) { 
            throw new UnderflowException('Stack is empty'); 
        } else { 
            $lastItem = $this->top(); 
            $this->stack->deleteLast(); 
            return $lastItem; 
        }  
    } 

    public function push(string $newItem)
    {  
        $this->stack->insert($newItem); 
    } 


    public function top(): string
    { 
        return $this->stack->getNthNode($this->stack->getSize())->data; 
    } 

    public function isEmpty(): bool
    { 
        return $this->stack->getSize() == 0; 
    } 

}

