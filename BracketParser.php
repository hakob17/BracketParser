/**
* Created by hakob on 5/9/16.
*/


<?php class BracketParser
{

    private static $stack = [];

    /**
     * @param $symbol
     * @return string
     * This function returns the pair of the bracket
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
     * @param $line
     * @return bool
     * This parses the String
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
     * @param array $s
     * @param $ch
     * @return bool
     *
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

?>