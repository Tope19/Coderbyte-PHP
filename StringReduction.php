<?php

function StringReduction($str) {
    $length  = strlen($str);

    for ($i = 0; $i < $length; $i++) {
        if (preg_match('/^([abc])\1*$/', $str)) {
            return strlen($str);
        } else {
            $bitstring = str_replace('a', '1', $str);
            $bitstring = str_replace('b', '2', $bitstring);
            $bitstring = str_replace('c', '4', $bitstring);
            $xor = eval("return " . preg_replace('/(.)(?=.)/', '$1 ^ ', $bitstring) . ";");
            if ($xor == 0 || $xor == 7)
                return 2;
            else
                return 1;
        }
    }
}