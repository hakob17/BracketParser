/**
* @license MIT
* @author hakob on 5/9/16.
*/


<?php

/**
 * [write a short description of what this class does]
 *
 * [is there an even more longer description of this class'
 *  features?]
 *
 * @author
 * @since
 */
class BracketParser
{
    /**
     * @var array $stack
     *
     */	
    private static $stack = [];

    /**
     * [Provide a short description for this method]
     *
     * @access private
     * @param [typeof] $symbol
     * @return string
     */
    private static function returnPair($symbol)
    {

        switch ($symbol) {
            case '(':
                return ')';
            case ')':
                return '(';
            case '{':
                return '}';
            case '}':
                return '{';
            case '[':
                return ']';
            case ']':
                return '[';
        }
    }

    /**
     * [provide a short description here]
     *
     * @param [typeeof]  $line
     * @return bool
     */
    public static function parse($line)
    {

        if (!is_string($line)) {
            return false;
        }


        for ($i = 0; $i < strlen($line); $i++) {
            if (!self::push($line[$i])) {
                return false;
            }
        }
        if (count(self::$stack) > 0) {

            return false;
        }

        return true;
    }

    /**
     * @param array $s
     * @param $ch
     * @return bool
     *
     */
    private static function push($ch)
    {
        switch ($ch) {
            case '(':
                self::$stack[] = $ch;
                break;
            case '{':
                self::$stack[] = $ch;
                break;
            case '[':
                self::$stack[] = $ch;
                break;
            default:
                return self::compare($ch);
        }

        return true;
    }

    /**
     * [bad documentation style, provide a short desc first]
     *
     * @param array $s
     * @param $ch
     * @return bool
     */
    private static function compare($ch)
    {
        if (end(self::$stack) === self::returnPair($ch)) {
            array_pop(self::$stack);
            return true;
        }

        return false;
    }
}

#-->obsolete, remove it ?>
