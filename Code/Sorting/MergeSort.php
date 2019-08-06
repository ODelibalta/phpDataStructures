<?php

namespace Code\Sorting;

class MergeSort
{
    function mergeSort(array $arr): array
    { 
        $len = count($arr); 
        $mid = (int) $len / 2; 
        if ($len == 1) 
            return $arr; 

        $left  = mergeSort(array_slice($arr, 0, $mid)); 
        $right = mergeSort(array_slice($arr, $mid)); 

        return merge($left, $right); 
    }

    function merge(array $left, array $right): array
    { 
        $combined = []; 
        $countLeft = count($left); 
        $countRight = count($right); 
        $leftIndex = $rightIndex = 0; 

        while ($leftIndex < $countLeft && $rightIndex < $countRight) { 
            if ($left[$leftIndex] > $right[$rightIndex]) { 
                $combined[] = $right[$rightIndex]; 
                $rightIndex++; 
            } else { 
                $combined[] = $left[$leftIndex]; 
                $leftIndex++; 
            } 
        } 

        while ($leftIndex < $countLeft) { 
            $combined[] = $left[$leftIndex]; 
            $leftIndex++; 
        } 

        while ($rightIndex < $countRight) { 
            $combined[] = $right[$rightIndex]; 
            $rightIndex++; 
        }
        
        return $combined;
    }

}

