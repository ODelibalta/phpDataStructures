<?php

namespace Code\Queues;

class CircularQueue implements QueueInterface
{ 
    /**
     * Queue data
     */
    private $queue;

    /**
     * Queue size
     */
    private $limit; 

    /**
     * Front node
     */
    private $front = 0; 

    /**
     * Rear node
     */
    private $rear = 0; 

    public function __construct(int $limit = 5)
    { 
        $this->limit = $limit; 
        $this->queue = []; 
    } 

    public function size()
    { 
        if ($this->rear > $this->front) 
            return $this->rear - $this->front; 
        return $this->limit - $this->front + $this->rear; 
    } 

    public function isEmpty()
    { 
        return $this->rear == $this->front; 
    } 

    public function isFull()
    { 
        $diff = $this->rear - $this->front; 
        if ($diff == -1 || $diff == ($this->limit - 1)) 
            return true; 
        return false; 
    } 

    /**
     * Add to queue - (new item + queue(n))
     */
    public function enqueue(string $item)
    { 
        if ($this->isFull()) { 
            throw new OverflowException("Queue is Full."); 
        } else { 
            $this->queue[$this->rear] = $item; 
            $this->rear = ($this->rear + 1) % $this->limit; 
        } 
    } 

    /**
     * Remove from queue - ( queue[n-1] )
     */
    public function dequeue()
    { 
        $item = ""; 
        if ($this->isEmpty()) { 
            throw new UnderflowException("Queue is empty"); 
        } else { 
            $item = $this->queue[$this->front]; 
            $this->queue[$this->front] = NULL; 
            $this->front = ($this->front + 1) % $this->limit; 
        } 
        return $item; 
    } 

    public function peek()
    { 
        return $this->queue[$this->front]; 
    }

}