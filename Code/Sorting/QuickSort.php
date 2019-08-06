<?php

namespace Code\Sorting;

class QuickSort
{
    function quickSort(array &$arr, int $p, int $r)
    {
        if($p < $r) {
            $q = partition($arr, $p, $r);
            quickSort($arr, $p, $q);
            quickSort($arr, $q+1, $r);
        }
    }

    function partition(array &$arr, int $p, int $r)
    { 
        $pivot = $arr[$p]; 
        $i = $p-1; 
        $j = $r+1; 
        while(true) 
        { 
            do { 
                $i++; 
            } while($arr[$i] < $pivot && $arr[$i] != $pivot); 
            do { 
                $j--; 
            } while($arr[$j] > $pivot && $arr[$j] != $pivot); 

            if($i < $j) { 
                $temp = $arr[$i]; 
                $arr[$i] = $arr[$j]; 
                $arr[$j] = $temp; 
            } else { 
                return $j; 
            } 
        } 
    }




}
