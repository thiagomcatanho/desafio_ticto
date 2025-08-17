<?php

namespace App\Support\DTOs;

use ReflectionClass;

abstract class BaseDTO
{
    /**
     * Create a new DTO from array using reflection.
     *
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): static
    {
        $class = new ReflectionClass(static::class);
        $constructor = $class->getConstructor();

        if (!$constructor) {
            return new static();
        }

        $params = [];

        foreach ($constructor->getParameters() as $param) {
            $name = $param->getName();
            $params[] = $data[$name] ?? $param->getDefaultValue();
        }

        return $class->newInstanceArgs($params);
    }

    /**
     * Convert DTO properties to array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
