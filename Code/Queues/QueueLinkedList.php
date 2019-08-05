<?php

namespace Code\Queues;

use Code\Lists\LinkedList;

class QueueLinkedList implements QueueInterface
{ 
    /**
     * Size of the queue
     */
    private $limit; 

    /**
     * Queue data
     */
    private $queue; 

    public function __construct(int $limit = 20)
    { 
      $this->limit = $limit; 
      $this->queue = new LinkedList(); 
    } 

    public function dequeue(): string
    {  
        if ($this->isEmpty()) { 
            throw new UnderflowException('Queue is empty'); 
        } else { 
            $lastItem = $this->peek(); 
            $this->queue->deleteFirst(); 
            return $lastItem; 
        } 
    } 

    public function enqueue(string $newItem, int $priority)
    {
        if ($this->queue->getSize() < $this->limit) {
            $this->queue->insert($newItem, $priority);
        } else {
            throw new OverflowException('Queue is full');
        }
    }
    

    public function peek(): string
    { 
        return $this->queue->getNthNode(1)->data; 
    } 

    public function isEmpty(): bool
    { 
        return $this->queue->getSize() == 0; 
    } 

    public function display()
    {
        $this->queue->display();
    }
}

