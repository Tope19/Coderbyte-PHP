<?php

function CountingAnagrams($str) {

    $words = explode(" ", $str);
          $list = [];
          foreach ($words as $word) {
              if (strlen($word) <= 2) {
                  continue;
              }
              if (in_array($word, $list)) {
                  continue;
              }
              $check = anagram($str, $word);
              if ($check > 1) {
                  $list[] = $word;
              }
          }

          return count($list) - 1;

  }

  function anagram($string, $word)
      {
          $n = strlen($string);
          $k = strlen($word);
          $d = [];

          for ($i = 0; $i < $k; $i++) {
              if (in_array($word[$i], $d))
                  $d[$word[$i]] = $d[$word[$i] + 1];
              else
                  $d[$word[$i]] = 1;
          }

          $i = 0;
          $j = 0;
          $count = count($d);
          $ans = 0;

          while ($j < $n) {
              if (in_array($string[$j], array_keys($d))) {
                  $d[$string[$j]] = $d[$string[$j]] - 1;

                  if ($d[$string[$j]] == 0) {
                      $count--;
                  }
              }

              if ($j - $i + 1 < $k)
                  $j++;
              else if (($j - $i + 1) == $k) {
                  if ($count == 0)
                      $ans++;

                  if (in_array($string[$i], array_keys($d))) {
                      $d[$string[$i]]  = $d[$string[$i]] +  1;
                      if ($d[$string[$i]] == 1)
                          $count++;
                  }
                  $i++;
                  $j++;
              }
          }

          return $ans - 1;
      }