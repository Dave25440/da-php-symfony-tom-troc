<?php

namespace App\Models;

abstract class AbstractModel
{
    protected ?int $id;
    protected ?\DateTime $createdAt;

    public function __construct(?int $id = null, ?\DateTime $createdAt = null)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
    }

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string|\DateTime|null $createdAt): void
    {
        if (is_string($createdAt)) {
            $createdAt = new \DateTime($createdAt);
        }

        $this->createdAt = $createdAt;
    }
}
