<?php

namespace Code\Lists;

class CircularLinkedList 
{

    /**
     * First node value
     */
    private $firstNode = null; 

    /**
     * Total node count
     */
    private $totalNode = 0; 

    /**
     * Inserts value to the end next is always first
     * 
     * @param $data String insert value
     */
    public function insertAtEnd(string $data = null)
    { 
        $newNode = new ListNode($data); 

        if ($this->firstNode === null) { 
            $this->firstNode = &$newNode; 
        } else { 
            $currentNode = $this->firstNode; 
            while ($currentNode->next !== $this->firstNode) { 
                $currentNode = $currentNode->next; 
            } 
            $currentNode->next = $newNode; 
        } 

        $newNode->next = $this->firstNode; 
        $this->totalNode++; 

        return true; 
    } 

    public function display()
    { 
        echo "Total: " . $this->totalNode . "\n"; 
        $currentNode = $this->firstNode; 

        while ($currentNode->next !== $this->firstNode) { 
            echo $currentNode->data . "\n"; 
            $currentNode = $currentNode->next; 
        } 

        if ($currentNode) { 
            echo $currentNode->data . "\n"; 
        } 
    }

}