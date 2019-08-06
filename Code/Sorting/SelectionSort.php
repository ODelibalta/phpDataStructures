<?php

namespace Code\Sorting;

class SelectionSort
{
    // selectionSort( A : list of sortable items )
    //     n = length(A)
    //     for i = 1 to n inclusive do
    //         min = i
    //         for j = i+1 to n inclusive do
    //         if A[j] < A[min] then
    //             min = j
    //         end if
    //         end for

    //         if min != i
    //             swap(a[i],a[min])
    //         end if

    //     end for
    // end
    function selSort(array $arr): array
    {
        $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
            $min = $i;
            for ($j = $i+1; $j < $len; $j++) {
                if ($arr[$j] < $arr[$min]) {
                    $min = $j;
                }
            }

            if ($min != $i) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$min];
                $arr[$min] = $tmp;
            }
        }
        return $arr;
    }

}
