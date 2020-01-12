<?php declare(strict_types=1);

namespace Calvin;

require __DIR__ . '/vendor/autoload.php';

$chatroom = new ChatRoom();
$memberSystem = new MemberSystem();

$server = new Server();
$server->set('new_chat_message', $chatroom);
$server->set('new_member', $memberSystem);

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

echo "END";
