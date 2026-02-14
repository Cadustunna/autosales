<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
    #[Layout("layouts.app")]
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
