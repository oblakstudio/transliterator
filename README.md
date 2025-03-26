<div align="center">

<h1 align="center" style="border-bottom: none; margin-bottom: 0px">Transliterator</h1>
<h3 align="center" style="margin-top: 0px">Convert serbian cyrillic text to latin and vice-versa</h3>


[![Packagist Version](https://img.shields.io/packagist/v/oblak/transliterator?label=Release&style=flat-square)](https://packagist.org/packages/oblak/transliterator)
![Packagist PHP Version](https://img.shields.io/packagist/dependency-v/oblak/transliterator/php?label=PHP&logo=php&logoColor=white&logoSize=auto&style=flat-square)

</div>


## Installation

You can install the package via composer:

```bash
$ composer require oblak/transliterator
```

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Oblak\Transliterator;

echo Transliterator::cirToLat('Четири Чавчића риби гризу реп!');    // Četiri Čavčića ribi grizu rep
echo Transliterator::cirToCutLat('Четири Чавчића риби гризу реп!'); // Cetiri Cavcica ribi grizu rep
echo Transliterator::latToCir("Da l' si ikada mene voljela?");      // Да л' си икада мене вољела?

```
## Benchmarks

Benchmark suite for [PHPBench](https://github.com/phpbench/phpbench) to compare various replacement methods.  
We benchmark `strtr`, `str_replace`, `preg_replace`.

To execute the benchmarks you can run the following command:

```bash
$ composer bench
```

