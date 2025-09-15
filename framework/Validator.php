<?php

namespace Framework;

class Validator
{
    protected $errors = [];

    public function __construct(
        protected array $data,
        protected array $rules = [],
        protected bool $autoredirect = true
    ) {
        $this->validate();

        if ($this->autoredirect && !$this->passes()) {
            back();
        }
    }

    public static function make(array $data, array $rules, bool $autoredirect = true): self
    {
        return new self($data, $rules, $autoredirect);
    }

    public function validate(): void
    {
        foreach ($this->rules as $field => $rules) {
            $rules = explode('|', $rules);
            $value = trim($this->data[$field]);

            foreach ($rules as $rule) {
                [$name, $param] = array_pad(explode(':', $rule), 2, null);

                $error = match ($name) {
                    'required'  => empty($value)            ? "$field is required."                                  : null,
                    'min'       => strlen($value) < $param  ? "$field must be at least $param characters."           : null,
                    'max'       => strlen($value) > $param  ? "$field must not exceed $param characters."            : null,
                    'url'       => filter_var($value, FILTER_VALIDATE_URL) === false ? "$field must be a valid URL." : null,
                    'email'     => filter_var($value, FILTER_VALIDATE_EMAIL) === false ? "$field must be a valid EMAIL." : null,
                    default => throw new \InvalidArgumentException("Validation rule '$name' is not defined"),
                };

                if ($error) {
                    $this->errors[] = $error;

                    break;                    
                }
            }            
        }
    }

    public function redirectIfFails(): void
    {
        back();
    }

    public function passes(): bool
    {
        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}