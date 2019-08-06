<?php

namespace Code\Sorting;

class InsertionSort
{
    // procedure insertionSort( A : list of sortable items )
    //     n = length(A)
    //     for i = 1 to n inclusive do
    //         key = A[i]
    //         j = i - 1
    //         while j >= 0 and A[j] > key   do
    //         A[j+1] = A[j]
    //         j--
    //         end while

    //         A[j+1] = key

    //     end for
    // end 

    function insertSort(array &$arr)
    { 
        $len = count($arr); 
        for ($i = 1; $i < $len; $i++) { 
            $key = $arr[$i]; 
            $j = $i - 1; 

            while($j >= 0 && $arr[$j] > $key) { 
                $arr[$j+1] = $arr[$j]; 
                $j--; 
            }      
            $arr[$j+1] = $key; 
        }     
    }

}
