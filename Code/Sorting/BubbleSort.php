<?php

namespace Code\Sorting;

class BubbleSort
{

    // bubbleSort( A : list of sortable items )
    //    n = length(A)
    //    bound = n -1
    //    for i = 1 to n inclusive do
    //      swapped = false
    //      newbound = 0
    //      for j = 1 to bound inclusive do
    //        if A[j] > A[j+1] then
    //          swap( A[j], A[j+1] )
    //             swapped = true
    //             newbound = j
    //        end if
    //      end for
    //      bound = newbound
    //      if swapped is false
    //         break
    //      end if
    //    end for
    // end 

    function bubSort(array $arr): array
    {
        $len = count($arr);
        $count = 0;
        $bound = $len-1;

        for ($i = 0; $i < $len; $i++) {
            $swapped = FALSE;
            $newBound = 0;
            for ($j = 0; $j < $bound; $j++) {
                $count++;
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j + 1];
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                    $swapped = TRUE;
                    $newBound = $j;

                }
            }
            $bound = $newBound;

            if (! $swapped) break;
        }
        echo $count."\n";
        return $arr;
    }

}
