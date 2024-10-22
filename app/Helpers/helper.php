<?php

if (!function_exists('abbreviateName')) {
    /**
     * Abbreviate the name.
     *
     * @param  string $name
     * @return string
     */
    function abbreviateName($name)
    {
        // Split the name into an array by space
        $nameParts = explode(' ', $name);

        // If the name has both first and last name
        if (count($nameParts) > 1) {
            // Abbreviate the first name to its initial and return the last name as is
            return strtoupper(substr($nameParts[0], 0, 1)) . '. ' . $nameParts[1];
        }

        // If the name only contains one part, return it unchanged
        return $name;
    }
}
