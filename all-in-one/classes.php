<?php declare(strict_types=1);

class ChatRoom {
    private array $messages = [];
    public function getMessageCount() : int {
        return count($this->messages);
    }
    public function __invoke($params) : void{
        array_push($this->messages, $params->message);
    }
}

class MemberSystem {
    protected array $database = [];
    public function getAgeByEmail($email) : int {
        return $this->database[$email];
    }
    public function __invoke($params) : void{
        $this->database[$params->email] = $params->age;
    }
}


Class Server{
    private array $callables = [];
    public function set(String $key, Callable $func){
        $this->callables[$key] = $func;
    }
    public function handleCallable($key, $params)
    {
        if(in_array($key, array_keys($this->callables))){
            $this->callables[$key]($params);
        }
    }

    function handle(String $payload) : void {
        $decodedPayload = json_decode($payload);

        if(!is_array($decodedPayload)){
            throw new Exception('Invalid payload!');
        }

        if(count($decodedPayload) == 0){
            exit(); // nothing to handle
        }

        foreach($decodedPayload as $request){
            $this->handleCallable($request->method, $request->params);
        }
    }
}