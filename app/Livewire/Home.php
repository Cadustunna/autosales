<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Inquiry;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
    #[Layout("layouts.app")]
    public $name;
    public $phone;
    public $message;

    protected $rules = [
        "name"=> "required|string|max:255",
        "phone"=> "required|string|max:255",
        "message"=> "required|string|max:255",
    ];

    public function contactForm()
    {
        $this->validate();

        Inquiry::create([
            "name"=> $this->name,
            "phone"=> $this->phone,
            "message" => $this->message
        ]);

        session()->flash('success', 'Inquiries sent successfully!');

        $this->reset("name", "phone", "message");
    }

    public function render()
    {
        return view('livewire.home', [
            'latestCars' => Car::with(['primaryImage', 'images']) // Load relationship
                ->where('status', 'available')
                ->latest()
                ->take(6) // Only get 6 latest cars
                ->get(),
        ]);

    }
}
