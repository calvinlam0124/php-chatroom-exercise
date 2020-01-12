<?php declare(strict_types=1);

use Calvin\ChatRoom;
use Calvin\MemberSystem;
use Calvin\Server;
use PHPUnit\Framework\TestCase;

final class indexTest extends TestCase
{
    public function testTrue(): void
    {
        $this->assertTrue(true);
    }

    public function testApp(): void
    {
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

        $this->assertEquals($chatroom->getMessageCount(), 2);
        $this->assertEquals($memberSystem->getAgeByEmail("carrie@example.com"), 12);
    }
}
