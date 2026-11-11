<?php

namespace Helper {
    class InputHelper
    {
        public static function input(string $info): string
        {
            echo "$info : ";
            return trim(fgets(STDIN));
        }
    }
}
