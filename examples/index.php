<?php
/**
 * Created by PhpStorm.
 * User: hakob
 * Date: 5/9/16
 * Time: 11:57 AM
 */

$s = "({[]})";
$s1 = "({[]})({{}))";
echo $s1 .'     ';
echo $s .'    ';
include 'BracketParser.php';

if(BracketParser::parse($s)) {
    echo "Is OK  \n";
}else {
    echo "Wrong bracket series\n";
}
if(BracketParser::parse($s1)) {
    echo "Is OK  \n";
}else {
    echo "Wrong bracket series\n";
}
