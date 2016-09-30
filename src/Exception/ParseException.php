<?php

namespace UCS\Swagger\Exception;

use InvalidArgumentException;

/**
 * @author Quentin Schuler <q.schuler@wakeonweb.com>
 */
class ParseException extends InvalidArgumentException
{
    /**
     * @param array $array
     * @param $key
     *
     * @return ParseException
     */
    public static function fromRequired(array $array, $key)
    {
        return new self(sprintf(
            'The key "%s" is required and has not been specified (%s).',
            $key,
            implode(', ', array_keys($array))
        ));
    }

    /**
     * @param string $expected
     * @param string $actual
     *
     * @return ParseException
     */
    public static function fromVersionIncompatibility($expected, $actual)
    {
        return new self(sprintf('The specified version is "%s" and should be "%s"', $actual, $expected));
    }

    /**
     * @param string[] $expected
     * @param string   $actual
     *
     * @return ParseException
     */
    public static function fromInvalidScheme(array $expected, $actual)
    {
        return new self(sprintf(
            'The given scheme "%s" is not in the scope of valid ones (%s).',
            $actual,
            implode(', ', $expected)
        ));
    }

    /**
     * @param string $path
     *
     * @return ParseException
     */
    public static function fromInvalidPathStart($path)
    {
        return new self(sprintf('The path "%s" is not valid. It should begin with "/".', $path));
    }
}