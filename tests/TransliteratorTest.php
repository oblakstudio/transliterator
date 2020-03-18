<?php

declare(strict_types=1);

use SGI\Transliterator;

use PHPUnit\Framework\TestCase;

final class TransliteratorTest extends TestCase
{

    public function test_lat_to_cut_lat()
    {

        $this->assertEquals(
            'A, B, V, G, D, Dj, E, Z, Z, I, J, K, L, LJ, M, N, NJ, O, P, R, S, T, C, U, F, H, C, C, Dz, S',
            Transliterator::lat_to_cut_lat(
                'A, B, V, G, D, Đ, E, Ž, Z, I, J, K, L, LJ, M, N, NJ, O, P, R, S, T, Ć, U, F, H, C, Č, DŽ, Š'
            )
        );

    }

    public function test_cir_to_cut_lat()
    {

        $this->assertEquals(
            'A, B, V, G, D, Dj, E, Z, Z, I, J, K, L, LJ, M, N, NJ, O, P, R, S, T, C, U, F, H, C, C, Dz, S',
            Transliterator::cir_to_cut_lat(
                'А, Б, В, Г, Д, Ђ, Е, Ж, З, И, Ј, К, Л, Љ, М, Н, Њ, О, П, Р, С, Т, Ћ, У, Ф, Х, Ц, Ч, Џ, Ш'
            )
        );

    }

    public function test_cir_to_lat()
    {

        $this->assertEquals(
            'A, B, V, G, D, Đ, E, Ž, Z, I, J, K, L, LJ, M, N, NJ, O, P, R, S, T, Ć, U, F, H, C, Č, DŽ, Š',
            Transliterator::cir_to_lat(
                'А, Б, В, Г, Д, Ђ, Е, Ж, З, И, Ј, К, Л, Љ, М, Н, Њ, О, П, Р, С, Т, Ћ, У, Ф, Х, Ц, Ч, Џ, Ш'
            )
        );

    }

    public function test_lat_to_cir()
    {

        $this->assertEquals(
            'А, Б, В, Г, Д, Ђ, Е, Ж, З, И, Ј, К, Л, Љ, М, Н, Њ, О, П, Р, С, Т, Ћ, У, Ф, Х, Ц, Ч, Џ, Ш',
            Transliterator::lat_to_cir('A, B, V, G, D, Đ, E, Ž, Z, I, J, K, L, LJ, M, N, NJ, O, P, R, S, T, Ć, U, F, H, C, Č, DŽ, Š')
        );

    }



}