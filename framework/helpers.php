<?php

if (!function_exists('root_path')) {
    /**
     * Get the absolute path to the project's root directory.
     *
     * @param string $path Optional subpath to append to the root directory.
     * @return string The absolute path.
     */
    function root_path(string $path = ''): string
    {
        return dirname(__DIR__) . '/' . ltrim($path, '/');
    }
}

if (!function_exists('view')) {
    /**
     * Render a view template with optional data.
     *
     * @param string $template The name of the template file (without .template.php extension).
     * @param array $data An associative array of data to be extracted into the template.
     * @return void
     */
    function view(string $template, array $data = []): void
    {
        $templatePath = root_path("resources/{$template}.template.php");

        if (!file_exists($templatePath)) {
            throw new InvalidArgumentException("Template file {$template}.template.php not found.");
        }

        extract($data);
        require $templatePath;
    }

    if (!function_exists('is_current_route')) {
        function is_current_route(string $route): bool
        {
            return $_SERVER['REQUEST_URI'] === $route;
        }
    }

    if (!function_exists('field_sent_on_form')) {
        function field_sent_on_form(string $field, array $fallback = []): string
        {
            return htmlspecialchars($_POST[$field] ?? ($fallback[$field] ?? ''));
        }
    }
}
