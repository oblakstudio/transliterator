# Transliterator: Simple class to convert serbian words in cyrillic script to latin and vice-versa

A project done by [Sibin Grasic](https://sgi.io)

## About

Transliterator is an easy-to-use class for PHP.
It was made to be a class that you could quickly include into a project and have it working right away.

## Installation

### Composer

From the Command Line:

```
composer require sgi/transliterator --prefer-dist
```

In your `composer.json`:

``` json
{
    "require": {
        "sgi/transliterator": "1.0"
    }
}
```

## Basic Usage

``` php
<?php

require 'vendor/autoload.php';

use SGI\Transliterator;

$cyrillic = 'Четири Чавчића риби гризу реп!';

$latin = Transliterator::cir_to_lat($cyrillic);
echo $latin;

$latin = "Da l' si ikada mene voljela?";

$cyrillic = Transliterator::lat_to_cir($latin);
echo $cyrillic

```

### Output

```
Četiri Čavčića ribi grizu rep
Да л' си икада мене вољела?
```

## License

GPLv2

You may copy, distribute and modify the software as long as you track changes/dates in source files. Any modifications to or software including (via compiler) GPL-licensed code must also be made available under the GPL along with build & install instructions.

