<?php //phpcs:disable SlevomatCodingStandard.Arrays.AlphabeticallySortedByKeys.IncorrectKeyOrder

/**
 * Transliterator class file.
 *
 * @package Transliterator
 */

namespace Oblak;

use Stringable;

/**
 * Transliterates from cyrilic to latin and vice versa.
 */
class Transliterator
{
    /**
     * Replace pairs for cyrilic to latin conversion
     *
     * @var array<string, string>
     */
    public const REPLACE_PAIRS = [
        'А'  => 'A',
        'Б'  => 'B',
        'В'  => 'V',
        'Г'  => 'G',
        'Д'  => 'D',
        'Ђ'  => 'Đ',
        'Е'  => 'E',
        'Ж'  => 'Ž',
        'З'  => 'Z',
        'И'  => 'I',
        'Ј'  => 'J',
        'К'  => 'K',
        'Л'  => 'L',
        'Љ'  => 'LJ',
        'М'  => 'M',
        'Н'  => 'N',
        'Њ'  => 'NJ',
        'О'  => 'O',
        'П'  => 'P',
        'Р'  => 'R',
        'С'  => 'S',
        'Т'  => 'T',
        'Ћ'  => 'Ć',
        'У'  => 'U',
        'Ф'  => 'F',
        'Х'  => 'H',
        'Ц'  => 'C',
        'Ч'  => 'Č',
        'Џ'  => 'DŽ',
        'Ш'  => 'Š',
        'а'  => 'a',
        'б'  => 'b',
        'в'  => 'v',
        'г'  => 'g',
        'д'  => 'd',
        'ђ'  => 'đ',
        'е'  => 'e',
        'ж'  => 'ž',
        'з'  => 'z',
        'и'  => 'i',
        'ј'  => 'j',
        'к'  => 'k',
        'л'  => 'l',
        'љ'  => 'lj',
        'м'  => 'm',
        'н'  => 'n',
        'њ'  => 'nj',
        'о'  => 'o',
        'п'  => 'p',
        'р'  => 'r',
        'с'  => 's',
        'т'  => 't',
        'ћ'  => 'ć',
        'у'  => 'u',
        'ф'  => 'f',
        'х'  => 'h',
        'ц'  => 'c',
        'ч'  => 'č',
        'џ'  => 'dž',
        'ш'  => 'š',
        'Ња' => 'Nja',
        'Ње' => 'Nje',
        'Њи' => 'Nji',
        'Њо' => 'Njo',
        'Њу' => 'Nju',
        'Ља' => 'Lja',
        'Ље' => 'Lje',
        'Љи' => 'Lji',
        'Љо' => 'Ljo',
        'Љу' => 'Lju',
        'Џа' => 'Dža',
        'Џе' => 'Dže',
        'Џи' => 'Dži',
        'Џо' => 'Džo',
        'Џу' => 'Džu',
    ];

    /**
     * Additional replace pairs for cyrilic to international latin conversion.
     *
     * These do not contain diacritics, so they can be used in URLs.
     *
     * @var array<string,string>
     */
    public const REPLACE_PAIRS_INTL = [
        'Ђ'  => 'Dj',
        'Ж'  => 'Z',
        'Ч'  => 'C',
        'Ћ'  => 'C',
        'Џ'  => 'Dz',
        'Ш'  => 'S',
        'ђ'  => 'dj',
        'ж'  => 'z',
        'ч'  => 'c',
        'ћ'  => 'c',
        'џ'  => 'dz',
        'ш'  => 's',
        'Џа' => 'Dza',
        'Џе' => 'Dze',
        'Џи' => 'Dzi',
        'Џо' => 'Dzo',
        'Џу' => 'Dzu',
    ];

    /**
     * Replace pairs for latin to international latin conversion
     *
     * @var array<string, string>
     */
    public const  LATIN_PAIRS_INTL = [
        'DŽ' => 'Dz',
        'Dž' => 'Dz',
        'dž' => 'dz',
        'Č'  => 'C',
        'č'  => 'c',
        'Ć'  => 'C',
        'ć'  => 'c',
        'Đ'  => 'Dj',
        'đ'  => 'dj',
        'Š'  => 'S',
        'š'  => 's',
        'Ž'  => 'Z',
        'ž'  => 'z',
    ];

    /**
     * Converts cyrilic string to latin
     *
     * @param  string|Stringable $text Cyrilic string to convert
     * @return string       Latin string
     */
    public static function cirToLat(string|Stringable $text = ''): string
    {
        return \strtr($text, static::REPLACE_PAIRS);
    }

    /**
     * Converts latin string to cyrilic
     *
     * @param  string|Stringable $text Latin string to convert
     * @return string       Cyrilic string
     */
    public static function latToCir(string|Stringable $text = ''): string
    {
        static $flipped;

        $flipped ??= \array_flip(static::REPLACE_PAIRS);

        return \strtr($text, $flipped);
    }

    /**
     * Converts cyrilic string to latin with cut chars
     *
     * @param  string|Stringable $text Cyrilic string to convert
     * @return string       Latin string with cut chars
     */
    public static function cirToCutLat(string|Stringable $text = ''): string
    {

        return \strtr($text, \array_merge(static::REPLACE_PAIRS, static::REPLACE_PAIRS_INTL));
    }

    /**
     * Converts latin string to latin with cut chars
     *
     * @param  string|Stringable $text Latin string to convert
     * @return string       Latin string with cut chars
     */
    public static function latToCutLat(string|Stringable $text = ''): string
    {
        return \strtr($text, static::LATIN_PAIRS_INTL);
    }
}
