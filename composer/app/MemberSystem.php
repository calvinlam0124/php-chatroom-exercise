<?php declare(strict_types=1);

namespace Calvin;

class MemberSystem
{
    protected array $database = [];

    public function getAgeByEmail($email): int
    {
        return $this->database[$email];
    }

    public function __invoke($params): void
    {
        $this->database[$params->email] = $params->age;
    }
}
