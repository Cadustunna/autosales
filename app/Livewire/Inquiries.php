<?php

namespace App\Livewire;

use App\Models\Inquiry;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Inquiries extends Component
{
    #[Layout("layouts.app")]
    public $name;
    public $phone;
    public $email;
    public $inquiry;
    public $message;

    protected $rules = [
        "name"=> "required|string|max:255",
        "phone"=> "nullable|string|max:255",
        "email" => "required|unique:user",
        "inquiry" => "required|in:General,Purchae,Make an offer, Test drive",
        "message"=> "required|string|max:255",
    ];

    public function contactForm()
    {
        $this->validate();

        Inquiry::create([
            "name"=> $this->name,
            "phone"=> $this->phone,
            "email"=> $this->email,
            "inquiry"=> $this->inquiry,
            "message" => $this->message
        ]);

        session()->flash('success', 'Inquiries sent successfully!');

        $this->reset("name", "phone", "email", "inquiry", "message");
    }

    public function render()
    {
        return view('livewire.inquiries');
    }
}
