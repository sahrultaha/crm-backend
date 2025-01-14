<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    public function definition()
    {
        $path = fake()->filePath();

        return [
            'filename' => basename($path),
            'filepath' => $path,
            'filetype' => 'csv',
            'file_category_id' => 1,
        ];
    }
}
