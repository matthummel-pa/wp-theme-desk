<?php

use MattHummel\ThemeDesk\Desk;
use MattHummel\ThemeDesk\Screen;

/**
 * Load Theme Desk when the theme does not use Composer for this package.
 */
if (! class_exists(Desk::class, false)) {
    require_once __DIR__.'/src/Desk.php';
}

if (! class_exists(Screen::class, false)) {
    require_once __DIR__.'/src/Screen.php';
}
