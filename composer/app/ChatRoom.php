<?php declare(strict_types=1);

namespace Calvin;

class ChatRoom
{
    private array $messages = [];

    public function getMessageCount(): int
    {
        return count($this->messages);
    }

    public function __invoke($params): void
    {
        array_push($this->messages, $params->message);
    }
}
