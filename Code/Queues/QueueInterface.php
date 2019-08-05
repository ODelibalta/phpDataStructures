<?php

namespace Code\Queues;

interface QueueInterface
{ 

    public function enqueue(string $item, int $priority); 

    public function dequeue(); 

    public function peek(); 

    public function isEmpty(); 
}



