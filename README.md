# Chatroom-exercise
- [All in one](all-in-one) It is easy to read.
- [Composer](composer) That implement composer to manage the package.

### Objective

- Implement a "server" that contains multiple services. 
- In this test we need to support two services: "ChatRoom" and "MemberSystem".
- A server request can invoke a service method.
- The server can handle an array of requests at the same time.
- A request contains 1) the name of the method to be invoked, and 2) parameter values to be used during the invocation of the method.

A sample of payload and expected result is described at the bottom of this file. Press the green "Run" button on top of this page to execute the code, result will be shown on the right panel.

If you have any question, kindly email me at kayue.yeung at hypebeast.com

```php

<?php
class Server {
  // TODO: Implement the server
  function handle($payload) {}
}

class ChatRoom {
  // TODO: Implement the chat room service
  public function getMessageCount() {}
}

class MemberSystem {
  // TODO: Implement the member system service
  public function getAgeByEmail($email) {}
}

// Initiate services
$chatroom = new ChatRoom();
$memberSystem = new MemberSystem();

// TODO: Register services to the server
$server = new Server();

/************************************
 * !! DO NOT EDIT CONTENT BELOW !!  *
 ************************************/

// Sending 3 requests at once
$server->handle('
[{
		"method": "new_chat_message", 
    "params": { "message": "Foo" }
	},
  {
		"method": "new_chat_message", 
    "params": { "message": "Bar" }
	},
  {
		"method": "new_member", 
    "params": { "email": "carrie@example.com", "age": 12 }
	}
]');

echo sprintf(
  "Chat room message count: %s (Expected: 2)\n",
  $chatroom->getMessageCount() // Return 2
); 

echo sprintf(
  "Carrie's age: %s (Expected: 12)\n",
  $memberSystem->getAgeByEmail("carrie@example.com") // Return 12
); 
```



### Expected output
```txt
Chat room message count:  (Expected: 2)
Carrie's age:  (Expected: 12)
```


