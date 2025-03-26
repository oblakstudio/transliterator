<?php //phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace, PSR1.Methods.CamelCapsMethodName.NotCamelCaps

use Oblak\Transliterator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Transliterator::class)]
final class TransliteratorTest extends TestCase
{
    /**
     * Test that the transliteration from cyrilic to latin works as expected.
     */
    #[DataProvider('textProvider')]
    public function test_cirToLat($cyrilic_text, $latin_text)
    {
        $this->assertEquals($latin_text, Transliterator::cirToLat($cyrilic_text));
    }

    /**
     * Test that the transliteration from latin to cyrilic works as expected.
     */
    #[DataProvider('textProvider')]
    public function test_latToCir($cyrilic_text, $latin_text)
    {
        $this->assertEquals($cyrilic_text, Transliterator::latToCir($latin_text));
    }

    /**
     * Test that the transliteration from latin to cut latin works as expected.
     */
    #[DataProvider('textProvider')]
    public function test_latToCutLat($cyrilic_text, $latin_text, $cut_latin_text)
    {
        $this->assertEquals($cut_latin_text, Transliterator::latToCutLat($latin_text));
    }

    /**
     * Test that the transliteration from cyrilic to cut latin works as expected.
     */
    #[DataProvider('textProvider')]
    public function test_cirToCutLat($cyrilic_text, $latin_text, $cut_latin_text)
    {
        $this->assertEquals($cut_latin_text, Transliterator::cirToCutLat($cyrilic_text));
    }

    public static function textProvider(): Generator
    {
        $textFiles = [ 'text2' ];

        foreach ($textFiles as $file) {
            yield $file => array_map(
                "file_get_contents",
                glob(__DIR__ . "/Fixtures/{$file}/*.txt"),
            );
        }
    }
}
