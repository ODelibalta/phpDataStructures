<?php

namespace Code\Lists;

class ListNode
{ 
    
    /**
     * Data on the list node
     */
    public $data = null;
    
    /**
     * Pointer to the next node
     */
    public $next = null;


    /**
     * Pointer to the prev node
     */
    public $prev = null; 

    /**
     * Data priority - queues
     */
    public $priority = null;


    public function __construct(string $data = null, int $priority = null) 
    { 
        $this->data = $data; 
        $this->priority = $priority;
    } 
}
