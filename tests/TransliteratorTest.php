<?php
// @codingStandardsIgnoreFile

declare(strict_types=1);

use Oblak\Transliterator;
use PHPUnit\Framework\TestCase;

final class TransliteratorTest extends TestCase {
    /**
     * Test that the transliteration from cyrilic to latin works as expected.
     *
     * @dataProvider textProvider
     */
    public function test_cirToLat($cyrilic_text, $latin_text) {
        $this->assertEquals($latin_text, Transliterator::cirToLat($cyrilic_text));
    }

    /**
     * Test that the transliteration from latin to cyrilic works as expected.
     *
     * @dataProvider textProvider
     */
    public function test_latToCir($cyrilic_text, $latin_text) {
        $this->assertEquals($cyrilic_text, Transliterator::latToCir($latin_text));
    }

    /**
     * Test that the transliteration from latin to cut latin works as expected.
     *
     * @dataProvider textProvider
     */
    public function test_latToCutLat($cyrilic_text, $latin_text, $cut_latin_text) {
        $this->assertEquals($cut_latin_text, Transliterator::latToCutLat($latin_text));
    }

    /**
     * Test that the transliteration from cyrilic to cut latin works as expected.
     *
     * @dataProvider textProvider
     */
    public function test_cirToCutLat($cyrilic_text, $latin_text, $cut_latin_text) {
        $this->assertEquals($cut_latin_text, Transliterator::cirToCutLat($cyrilic_text));
    }

    public function textProvider() {
        $textFiles = [
            'text2',
        ];

        $texts = [];

        foreach ($textFiles as $textFile) {
            $texts[$textFile] = [
                file_get_contents(__DIR__ . '/' . $textFile . '-cir.txt'),
                file_get_contents(__DIR__ . '/' . $textFile . '-lat.txt'),
                file_get_contents(__DIR__ . '/' . $textFile . '-cut-lat.txt'),
            ];
        }

        return $texts;
    }
}
