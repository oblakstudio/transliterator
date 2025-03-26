<?php //phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps

namespace Oblak\Tests\Benchmark;

use Generator;
use Oblak\Transliterator;
use PhpBench\Attributes\BeforeMethods;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\OutputTimeUnit;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Revs;
use PhpBench\Attributes\Subject;

/**
 * Benchmarks the transliteration.
 */
#[BeforeMethods('init')]
#[ParamProviders([ 'textProvider' ])]
class TranslitBench
{
    private string $text;

    private array $search;

    private array $replace;

    private array $patterns;

    public function init(array $params): void
    {
        $this->search = \array_keys(Transliterator::REPLACE_PAIRS);
        $this->replace = \array_values(Transliterator::REPLACE_PAIRS);
        $this->patterns = \array_map(static fn($key) => '/' . \preg_quote($key, '/') . '/', $this->search);

        $this->text = \file_get_contents(\dirname(__DIR__) . "/Fixtures/bench/{$params['file']}");
    }

    #[Subject()]
    public function strtr(): void
    {
        Transliterator::cirToLat($this->text);
        // \strtr($this->text, Transliterator::REPLACE_PAIRS);
    }

    #[Subject()]
    public function str_replace(): void
    {
        \str_replace($this->search, $this->replace, $this->text);
    }

    #[Subject()]
    public function preg_replace(): void
    {
        \preg_replace($this->patterns, $this->replace, $this->text);
    }

    public function textProvider(): Generator
    {
        yield 'text' => [ 'file' => 'cir.txt' ];
        yield 'html' => [ 'file' => 'cir.html' ];
    }
}
