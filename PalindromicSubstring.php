<?php

function PalindromicSubstring($str){
    $maxLength = 1;
        $start = 0;
        $length = strlen($str);

        // Nested loop to mark start and end index
        for ($i = 0; $i < $length; $i++) {
            for ($j = $i; $j < $length; $j++) {
                $flag = 1;

                // Check palindrome
                for ($k = 0; $k < ($j - $i + 1) / 2; $k++)
                    if ($str[$i + $k] != $str[$j - $k])
                        $flag = 0;

                // Palindrome
                if ($flag != 0 && ($j - $i + 1) > $maxLength) {
                    $start = $i;
                    $maxLength = $j - $i + 1;
                }
            }
        }

        $chars = "";
        $stop = $start + $maxLength - 1;
        for ($i = $start; $i <= $stop; ++$i) {
            $chars .= $str[$i];
        }

        if (strlen($chars) <= 2) {
            $chars = "none";
        }
        return $chars;

}