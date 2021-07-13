<?php
// Toptal Question One
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($S) {
    // write your code in PHP7.0
    $transformedSentence = $S;
    $i=0; $j=0;
    $wordCounter = 0;
    $sentenceWordCount = [];

    $transformedSentence = str_replace(".","|",$transformedSentence);
    $transformedSentence = str_replace("!","|",$transformedSentence);
    $transformedSentence = str_replace("?","|",$transformedSentence);
    $sentences = explode('|', $transformedSentence);
    foreach($sentences as $sentence) {
        $wordsList = explode(" ", $sentence);
        foreach($wordsList as $word) {
            if(trim($word) !== "") {
                $wordCounter++;
            }
        }
        $sentenceWordCount[] = $wordCounter;
        $wordCounter = 0;
    }
    return max($sentenceWordCount);
}

echo solution("We test coders. Give us a try? He really did a wonderful job!");
