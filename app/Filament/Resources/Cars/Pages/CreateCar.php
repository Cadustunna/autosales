<?php

namespace App\Filament\Resources\Cars\Pages;

use App\Filament\Resources\Cars\CarResource;
use App\Models\CarImage;
use Filament\Resources\Pages\CreateRecord;

class CreateCar extends CreateRecord
{
    protected static string $resource = CarResource::class;

    protected function afterCreate(): void
    {
        $car = $this->record;
        $images = $this->data['images'] ?? [];

        if (!empty($images)) {

            // Fix: Use array_values to get numeric indices
            $images = array_values($images);

            foreach ($images as $index => $imagePath) {
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => $imagePath,
                    'order' => $index,
                    'is_primary' => $index === 0,
                ]);
            }
        }

         // Handle features if they're in the form
        if (isset($this->data['features'])) {
            foreach ($this->data['features'] as $feature) {
                $car->features()->create([
                    'feature' => $feature['feature'],
                ]);
            }
        }

        // Handle categories if they're in the form
        if (isset($this->data['categories'])) {
            $car->categories()->sync($this->data['categories']);
        }
    }
}
