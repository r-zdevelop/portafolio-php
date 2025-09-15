<?php

namespace Framework;

class SessionManager
{
    public function set(string $key, mixed $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key, mixed $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function setFlash(string $key, mixed $value)
    {
        $this->set('flash_' . $key, $value);
    }

    public function getFlash(string $key, mixed $default = null)
    {
        $value = $this->get('flash_' . $key, $default);

        if ($value !== null) {
            $this->remove('flash_' . $key);
        }

        return $value;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }
}