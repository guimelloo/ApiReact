<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPMailer\PHPMailer\PHPMailer;
use Tests\TestCase;

class EmailCreateTest extends TestCase
{   
    use RefreshDatabase;
    
    public function test_the_application_returns_a_successful_response(): void
    {
        $mailMock = $this->createMock(PHPMailer::class);

        $mailMock->expects($this->once())
        ->method('send')
        ->willReturn(true);

        $this->app->instance(PHPMailer::class, $mailMock);

        $params = [
            'email' => 'test@gmail.com',
            'content' => 'content test',
        ];

        $response = $this->post('/api/email', $params)
            ->assertSuccessful();

        $this->assertDatabaseHas('emails', [
            'email' => 'test@gmail.com',
            'content' => 'content test',
        ]);
    }
}
