<?php declare(strict_types=1);

namespace Calvin;

class Server
{
    private array $callables = [];

    public function set(String $key, callable $func)
    {
        $this->callables[$key] = $func;
    }

    public function handleCallable($key, $params)
    {
        if (in_array($key, array_keys($this->callables))) {
            $this->callables[$key]($params);
        }
    }

    public function handle(String $payload): void
    {
        $decodedPayload = json_decode($payload);

        if (!is_array($decodedPayload)) {
            throw new Exception('Invalid payload!');
        }

        if (count($decodedPayload) == 0) {
            exit(); // nothing to handle
        }

        foreach ($decodedPayload as $request) {
            $this->handleCallable($request->method, $request->params);
        }
    }
}
