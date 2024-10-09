<?php

namespace Tests\Feature;

use Database\Factories\EmailFactory;
use Tests\TestCase;

class EmailListTest extends TestCase
{   
    public function test_list_all_emails(): void
    {
       $email = EmailFactory::new()->any()->create(['email' => 'test@gmail.com', 'content' => 'aaa']);

       $this->get("/api")
       ->assertSuccessful()
       ->assertJsonPath('data.0.id', $email->id)
       ->assertJsonPath('data.0.email', 'test@gmail.com')
       ->assertJsonPath('data.0.logo', 'test.png');
    }
}
