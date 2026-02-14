<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Attributes\Layout;
use Livewire\Component;

class View extends Component
{
    #[Layout("layouts.app")]

    public $car_details;
    public function mount($id)
    {
        $car = Car::with(['images','features'])->findOrFail($id);

        // Increment view count
        $car->incrementViews();

        $this->car_details = [$car];
    }
    public function render()
    {
        return view('livewire.view');
    }
}
