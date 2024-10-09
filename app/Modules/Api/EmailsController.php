<?php

namespace App\Modules\Api;

use App\Models\Email;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class EmailsController
{
    public function __construct(private Email $eloquent)
    {}  

    public function index()
    {
        return $this->eloquent->newQuery()->get();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string',
            'content' => 'required|string',
            'topic' => 'nullable|string'
        ]);
        
        $this->eloquent->newQuery()->create($data);

        $this->send($data['email'], $data['content']);
    }

    private function send(string $reciver, string $content,)
    {
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'negromonteguilherme@gmail.com';  
        $mail->Password = 'ytpoqeasucxvvjrp';    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('negromonteguilherme@gmail.com', 'guilherme');
        $mail->addAddress($reciver, '');

        $mail->isHTML(false);

        $mail->Subject = '';

        $mail->Body = $content;
        
        $mail->send();
    }
}
