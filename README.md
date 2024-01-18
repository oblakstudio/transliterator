# Transliterator: Simple class to convert serbian words in cyrillic script to latin and vice-versa

## About

Transliterator is an easy-to-use class for PHP.
It was made to be a class that you could quickly include into a project and have it working right away.

## Installation

### Via Composer

```
composer require oblak/transliterator
```
## Basic Usage

``` php
<?php

require 'vendor/autoload.php';

use Oblak\Transliterator;

echo Transliterator::cirToLat('Четири Чавчића риби гризу реп!');
echo Transliterator::latToCir("Da l' si ikada mene voljela?");
```

### Output

```
Četiri Čavčića ribi grizu rep
Да л' си икада мене вољела?
```
