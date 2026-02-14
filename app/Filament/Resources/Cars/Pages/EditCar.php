<?php

namespace App\Filament\Resources\Cars\Pages;

use App\Filament\Resources\Cars\CarResource;
use App\Models\CarImage;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditCar extends EditRecord
{
    protected static string $resource = CarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load existing images for display
        $data['images'] = $this->record->images->pluck('image_path')->toArray();

        // Load existing features for display
        $data['features'] = $this->record->features->map(function ($feature) {
            return ['feature' => $feature->feature];
        })->toArray();

        // Load existing categories
        $data['categories'] = $this->record->categories->pluck('id')->toArray();

        return $data;
    }

    protected function afterSave(): void
    {
        $car = $this->record;

        // Handle Images
        $newImages = $this->data['images'] ?? [];
        $existingImages = $car->images->pluck('image_path')->toArray();

        // Delete removed images
        $imagesToDelete = array_diff($existingImages, $newImages);
        if (!empty($imagesToDelete)) {
            CarImage::where('car_id', $car->id)
                ->whereIn('image_path', $imagesToDelete)
                ->delete();

            // Delete physical files
            foreach ($imagesToDelete as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        // Add new images
        $imagesToAdd = array_diff($newImages, $existingImages);
        if (!empty($imagesToAdd)) {
            $currentCount = $car->images()->count();
            $imagesToAdd = array_values($imagesToAdd); // Fix: Reset array indices

            foreach ($imagesToAdd as $index => $imagePath) {
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => $imagePath,
                    'order' => $currentCount + $index,
                    'is_primary' => $currentCount === 0 && $index === 0,
                ]);
            }
        }

        // Reorder existing images
        $newImages = array_values($newImages); // Fix: Reset array indices
        foreach ($newImages as $order => $imagePath) {
            CarImage::where('car_id', $car->id)
                ->where('image_path', $imagePath)
                ->update([
                    'order' => $order,
                    'is_primary' => $order === 0,
                ]);
        }

        // Handle Features
        if (isset($this->data['features'])) {
            // Delete all existing features
            $car->features()->delete();

            // Create new features
            foreach ($this->data['features'] as $feature) {
                if (!empty($feature['feature'])) {
                    $car->features()->create([
                        'feature' => $feature['feature'],
                    ]);
                }
            }
        }

        // Handle Categories
        if (isset($this->data['categories'])) {
            $car->categories()->sync($this->data['categories']);
        }
    }
}
