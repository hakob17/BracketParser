<?php

/**
 * BracketParser Class
 *
 * @author hakob
 * @since 5/9/16
 * @license MIT
 */
class BracketParser
{
    /**
     * @var array $stack
     *
     */	
    private static $stack = [];

    /**
     * returns the counterpart of the given symbol
     * 
     * #
     * # Suggestion:
     * #
     * # Rename this method to fetchClosingCounterpart($chr)
     *
     * @param string $symbol
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
     * parses a line
     *
     * #
     * # Suggestions:
     * # 
     * # change $line to $string
     * #
     * 
     * @param string $line
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
     * pushes a character to the current stack.
     * 
     * #
     * # suggestion:
     * #
     * # change $ch to $chr
     * #
     * 
     * @param string $ch
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
     * compares a character to the current stack.
     * 
     * #
     * # Suggestion:
     * #
     * # change $ch to $chr
     * #
     *
     * @param string $ch
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
