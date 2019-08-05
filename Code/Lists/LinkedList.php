<?php

namespace Code\Lists;

class LinkedList implements \Iterator
{ 
    /**
     * First node in the list
     */
    private $firstNode = null; 

    /**
     * Total node
     */
    private $totalNode = 0; 

    /**
     * Current list node
     */
    private $currentNode = null; 

    /**
     * Current node position
     */
    private $currentPosition = 0;

    /**
     * Inserts a node
     * 
     * @param $data String value for the node
     * @param $priority Int data priority for list queues
     */
    public function insert(string $data = null, int $priority = null)
    { 
        $newNode = new ListNode($data, $priority); 
        $this->totalNode++; 
      
        if ($this->firstNode === null) { 
            $this->firstNode = &$newNode; 
        } else { 
            $previous = $this->firstNode; 
            $currentNode = $this->firstNode; 
            while ($currentNode !== null) { 
                if ($currentNode->priority < $priority) {
                    if ($currentNode == $this->firstNode) {
                        $previous = $this->firstNode; 
                        $this->firstNode = $newNode; 
                        $newNode->next = $previous; 
                        return; 
                    } 
                    $newNode->next = $currentNode; 
                    $previous->next = $newNode; 
                    return; 
                } 
                $previous = $currentNode; 
                $currentNode = $currentNode->next; 
            } 
        } 
      
        return true; 
      }
      
    /**
     * Inserts the first node
     * @param $data String String value for the node
     */
    public function insertAtFirst(string $data = null)
    { 
        $newNode = new ListNode($data); 

        // is the first node empty ? then this is root
        if ($this->firstNode === null) {             
            $this->firstNode = &$newNode;             
        } else { 
            $currentFirstNode = $this->firstNode; 
            $this->firstNode = &$newNode; 
            $newNode->next = $currentFirstNode;            
        } 

        $this->totalNode++; 

        return true;
    }

    /**
     * Searches for a node with the given string
     * 
     * @param $data String search text
     */
    public function search(string $data = null)
    {
        if ($this->totalNode) {
            $currentNode = $this->firstNode; 
            while ($currentNode !== null) {
                if ($currentNode->data === $data) {
                    return $currentNode; 
                }
                $currentNode = $currentNode->next; 
            }
        }
        return false;
    }

    /**
     *  Inserts node before the node that matches the query
     * 
     * @param $data String new value to insert
     * @param $query String Search value for the node
     */
    public function insertBefore(string $data = null, string $query = null)
    { 
        $newNode = new ListNode($data);

        if ($this->firstNode) { 
            $previous = null; 
            $currentNode = $this->firstNode; 

            while ($currentNode !== null) { 
                if ($currentNode->data === $query) { 
                    $newNode->next = $currentNode; 
                    $previous->next = $newNode; 
                    $this->totalNode++; 
                    break; 
                } 

                $previous = $currentNode; 
                $currentNode = $currentNode->next; 
            }
        } 
    } 

    /**
     *  Inserts node before the node that matches the query
     * 
     * @param $data String new value to insert
     * @param $query String Search value for the node
     */
    public function insertAfter(string $data = null, string $query = null)
    { 
        $newNode = new ListNode($data);

        if ($this->firstNode) { 
            $nextNode = null; 
            $currentNode = $this->firstNode; 
            while ($currentNode !== null) { 
                if ($currentNode->data === $query) { 
                    if($nextNode !== null) { 
                        $newNode->next = $nextNode; 
                    } 
                    $currentNode->next = $newNode; 
                    $this->totalNode++; 
                    break; 
                } 
                $currentNode = $currentNode->next; 
                $nextNode = $currentNode->next; 
            } 
        } 
    } 

    /**
     * Deletes the first node and makes the second node first
     */
    public function deleteFirst()
    { 
        if ($this->firstNode !== null) { 
            if ($this->firstNode->next !== null) { 
                $this->firstNode = $this->firstNode->next; 
            } else { 
                $this->firstNode = null; 
            } 

            $this->totalNode--; 
            return true; 
        } 

        return false; 
    } 

    /**
     * Deletes the last node
     */
    public function deleteLast()
    {
        if ($this->firstNode !== null) { 
            $currentNode = $this->firstNode; 
            if ($currentNode->next === null) { 
                $this->firstNode = null; 
            } else { 
                $previousNode = null; 

                while ($currentNode->next !== null) { 
                    $previousNode = $currentNode; 
                    $currentNode = $currentNode->next; 
                } 

                $previousNode->next = null; 
                $this->totalNode--;
                return true; 
            } 
        } 
        return false; 
    } 

    /**
     * Deletes the node that matches our search query
     */
    public function delete(string $query = null)
    { 
        if ($this->firstNode) {
            $previous = null; 
            $currentNode = $this->firstNode; 
            while ($currentNode !== null) { 
                if ($currentNode->data === $query) { 
                    if ($currentNode->next === null) { 
                        $previous->next = null; 
                    } else { 
                        $previous->next = $currentNode->next; 
                    } 

                    $this->totalNode--; 
                    break; 
                } 
                $previous = $currentNode; 
                $currentNode = $currentNode->next; 
            } 
        } 
    } 

    /**
     * Reverses the linked list
     */
    public function reverse()
    { 
        if ($this->firstNode !== null) {
            if ($this->firstNode->next !== null) { 
                $reversedList = null; 
                $next = null; 
                $currentNode = $this->firstNode; 
                while ($currentNode !== null) { 
                    $next = $currentNode->next; 
                    $currentNode->next = $reversedList; 
                    $reversedList = $currentNode; 
                    $currentNode = $next; 
                } 
                $this->firstNode = $reversedList; 
            } 
        } 
    } 


    public function getNthNode(int $n = 0)
    { 
        $count = 1; 
        if ($this->firstNode !== null) { 
            $currentNode = $this->firstNode; 
            while ($currentNode !== null) { 
                if ($count === $n) { 
                    return $currentNode; 
                } 
                $count++; 
                $currentNode = $currentNode->next; 
            } 
        } 
    } 

    public function current()
    { 
        return $this->currentNode->data; 
    } 

    public function next()
    { 
        $this->currentPosition++; 
        $this->currentNode = $this->currentNode->next; 
    } 

    public function key()
    { 
        return $this->currentPosition; 
    } 

    public function rewind()
    { 
        $this->currentPosition = 0; 
        $this->currentNode = $this->firstNode; 
    } 

    public function valid()
    { 
        return $this->currentNode !== null; 
    } 

    public function getSize()
    {
        return $this->totalNode;
    }


    /**
     * Prints the linked list
     */
    public function display() { 
        echo "Total: ".$this->totalNode."\n"; 

        $currentNode = $this->firstNode; 

        while ($currentNode !== null) { 
            echo $currentNode->data . "\n"; 
            $currentNode = $currentNode->next; 
        } 

    } 
}
