<?php

namespace Code\Searching;

class BinarySearch
{

    function binarySearch(array $numbers, int $needle, int $low, int $high): bool
    { 
        if ($high < $low) { 
            return FALSE; 
        } 

        $mid = (int) (($low + $high) / 2); 

        if ($numbers[$mid] > $needle) { 
            return binarySearch($numbers, $needle, $low, $mid - 1); 
        } else if ($numbers[$mid] < $needle) { 
            return binarySearch($numbers, $needle, $mid + 1, $high); 
        } else { 
            return TRUE; 
        } 
    }

    function repetitiveBinarySearch(array $numbers, int $needle): int
    { 
        $low = 0;
        $high = count($numbers) - 1;
        $firstOccurrence = -1;

        while ($low <= $high) { 
            $mid = (int) (($low + $high) / 2); 

            if ($numbers[$mid] === $needle) { 
                $firstOccurrence = $mid; 
                $high = $mid - 1; 
            } else if ($numbers[$mid] > $needle) { 
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            } 
        } 
        return $firstOccurrence; 
    } 

    function interpolationSearch(array $arr, int $key): int
    { 
        $low = 0; 
        $high = count($arr) - 1; 

        while ($arr[$high] != $arr[$low] && $key >= $arr[$low] && $key <= $arr[$high]) { 

            $mid = intval($low + (($key - $arr[$low]) * ($high - $low) 
            / ($arr[$high] - $arr[$low]))); 

            if ($arr[$mid] < $key) 
                $low = $mid + 1; 
            else if ($key < $arr[$mid]) 
                $high = $mid - 1; 
            else 
                return $mid; 
        } 

        if ($key == $arr[$low]) 
            return $low; 
        else
            return -1; 
    }

}
