<?php

namespace Code\Lists;

class DoublyLinkedList
{

    /**
     * First node
     */
    private $firstNode = null;

    /**
     * Last node
     */
    private $lastNode = null;

    /**
     * Node count
     */
    private $totalNode = 0;


    /**
     * Inserts data at first node
     * 
     * @param $data String Node value
     */
    public function insertAtFirst(string $data = null)
    {
        $newNode = new ListNode($data);

        if ($this->firstNode === null) {
            $this->firstNode = &$newNode;
            $this->lastNode = $newNode; 
        } else {
            $currentFirstNode = $this->firstNode; 
            $this->firstNode = &$newNode; 
            $newNode->next = $currentFirstNode; 
            $currentFirstNode->prev = $newNode; 
        }

        $this->totalNode++; 

        return true;
    }

    /**
     * Inserts data at last node
     * 
     * @param $data String node value
     */
    public function insertAtLast(string $data = null)
    { 
        $newNode = new ListNode($data);

        if ($this->firstNode === null) {
            $this->firstNode = &$newNode; 
            $this->lastNode = $newNode; 
        } else {
            $currentNode = $this->lastNode; 
            $currentNode->next = $newNode; 
            $newNode->prev = $currentNode; 
            $this->lastNode = $newNode; 
        }
        
        $this->totalNode++;

        return true;
    }

    /**
     * Inserts before the matched node 
     * 
     * @param $data String insert value
     * @param $query String query value
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
                    $currentNode->prev = $newNode; 
                    $previous->next = $newNode; 
                    $newNode->prev = $previous; 
                    $this->totalNode++; 
                    break; 
                }
                $previous = $currentNode; 
                $currentNode = $currentNode->next; 
            }
        }
    }

    /**
     * Inserts after the matched node
     * 
     * @param $data String insert value
     * @param $query String search value
     */
    public function insertAfter(string $data = null, string $query = null)
    { 
        $newNode = new ListNode($data);

        if ($this->firstNode) { 
            $nextNode = null; 
            $currentNode = $this->firstNode;

            while ($currentNode !== null) { 
                if ($currentNode->data === $query) { 
                    if ($nextNode !== null) { 
                        $newNode->next = $nextNode; 
                    } 
                    if ($currentNode === $this->lastNode) { 
                        $this->lastNode = $newNode; 
                    } 
                    $currentNode->next = $newNode; 
                    $nextNode->prev = $newNode; 
                    $newNode->prev = $currentNode; 
                    $this->totalNode++; 
                    break; 
                } 
                $currentNode = $currentNode->next; 
                $nextNode = $currentNode->next; 
            }
        }
    }

    /**
     * Deletes the first node
     */
    public function deleteFirst()
    { 
        if ($this->firstNode !== null) {
            if ($this->firstNode->next !== null) { 
                $this->firstNode = $this->firstNode->next; 
                $this->firstNode->prev = null; 
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
        if ($this->lastNode !== null) { 
            $currentNode = $this->lastNode; 
            if ($currentNode->prev === null) { 
                $this->firstNode = null; 
                $this->lastNode = null; 
            } else { 
                $previousNode = $currentNode->prev; 
                $this->lastNode = $previousNode; 
                $previousNode->next = null; 

                $this->totalNode--; 
                return true; 
            } 
        } 

        return false; 
    }

    /**
     * Deletes the matched node
     * 
     * @param $query String search value
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
                        $currentNode->next->prev = $previous; 
                    }

                    $this->totalNode--; 
                    break; 
                }
                $previous = $currentNode; 
                $currentNode = $currentNode->next; 
            }
        }
    }

    public function displayForward()
    { 
        echo "Total: " . $this->totalNode . "\n"; 
        $currentNode = $this->firstNode; 

        while ($currentNode !== null) { 
            echo $currentNode->data . "\n"; 
            $currentNode = $currentNode->next; 
        } 
    } 

    public function displayBackward()
    { 
        echo "Total: " . $this->totalNode . "\n"; 
        $currentNode = $this->lastNode; 

        while ($currentNode !== null) { 
            echo $currentNode->data . "\n"; 
            $currentNode = $currentNode->prev; 
        }
    }



}