<?php

namespace Database\Seeders;

use App\Models\TextColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextColorSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $colors = [
      ['color_name' => 'Snow White', 'color_image' => 'storage/text_colors/file_1720107103.png', 'text_color_code' => '#FFFFFF'],
      ['color_name' => 'Ivory', 'color_image' => 'storage/text_colors/file_1720107014.png', 'text_color_code' => '#FFFFF0'],
      ['color_name' => 'Lemon', 'color_image' => 'storage/text_colors/file_1720107194.png', 'text_color_code' => '#FFF700'],
      ['color_name' => 'Foundation', 'color_image' => 'storage/text_colors/file_1720107129.png', 'text_color_code' => '#D9B28D'],
      ['color_name' => 'Stunning Yellow', 'color_image' => 'storage/text_colors/file_1732087948.png', 'text_color_code' => '#FFCC00'],
      ['color_name' => 'Star Gold', 'color_image' => 'storage/text_colors/file_1720107106.png', 'text_color_code' => '#FFD700'],
      ['color_name' => 'Baby Blue', 'color_image' => 'storage/text_colors/file_1732087745.png', 'text_color_code' => '#89CFF0'],
      ['color_name' => 'Gold', 'color_image' => 'storage/text_colors/file_1720106988.png', 'text_color_code' => '#FFD700'],
      ['color_name' => 'Pastal Blue', 'color_image' => 'storage/text_colors/file_1720107074.png', 'text_color_code' => '#AEC6CF'],
      ['color_name' => 'Manila', 'color_image' => 'storage/text_colors/file_1720107030.png', 'text_color_code' => '#F4C542'],
      ['color_name' => 'Brite Yellow', 'color_image' => 'storage/text_colors/file_1720106995.png', 'text_color_code' => '#FFEF00'],
      ['color_name' => 'Rose Cerise', 'color_image' => 'storage/text_colors/file_1732087937.png', 'text_color_code' => '#D10056'],
      ['color_name' => 'Otter Grey', 'color_image' => 'storage/text_colors/file_1720107067.png', 'text_color_code' => '#6E7B8B'],
      ['color_name' => 'Seafoam', 'color_image' => 'storage/text_colors/file_1720107101.png', 'text_color_code' => '#93E9A9'],
      ['color_name' => 'Neon Pink', 'color_image' => 'storage/text_colors/file_1720107280.png', 'text_color_code' => '#FF10F0'],
      ['color_name' => 'Poker Primrose', 'color_image' => 'storage/text_colors/file_1720107284.png', 'text_color_code' => '#D2B100'],
      ['color_name' => 'Wild Pink', 'color_image' => 'storage/text_colors/file_1720107125.png', 'text_color_code' => '#F21C79'],
      ['color_name' => 'Neon Orange', 'color_image' => 'storage/text_colors/file_1732087922.png', 'text_color_code' => '#FF6600'],
      ['color_name' => 'Neon Green', 'color_image' => 'storage/text_colors/file_1720107043.png', 'text_color_code' => '#00FF00'],
      ['color_name' => 'Dark Texas Orange', 'color_image' => 'storage/text_colors/file_1732087846.png', 'text_color_code' => '#FF7F32'],
      ['color_name' => 'Grilled Orange', 'color_image' => 'storage/text_colors/file_1732087862.png', 'text_color_code' => '#FF5722'],
      ['color_name' => 'TH Gold', 'color_image' => 'storage/text_colors/file_1720107204.png', 'text_color_code' => '#FFD700'],
      ['color_name' => 'Kelly', 'color_image' => 'storage/text_colors/file_1720107023.png', 'text_color_code' => '#4CBB17'],
      ['color_name' => 'J.Turquoise', 'color_image' => 'storage/text_colors/file_1720107018.png', 'text_color_code' => '#00B5B8'],
      ['color_name' => 'Rust', 'color_image' => 'storage/text_colors/file_1720107097.png', 'text_color_code' => '#B7410E'],
      ['color_name' => 'Neon Red', 'color_image' => 'storage/text_colors/file_1732087926.png', 'text_color_code' => '#FF0000'],
      ['color_name' => 'Grey Flannel', 'color_image' => 'storage/text_colors/file_1720107003.png', 'text_color_code' => '#6C6E71'],
      ['color_name' => 'Sunwash Blue', 'color_image' => 'storage/text_colors/file_1732087959.png', 'text_color_code' => '#D0E8FF'],
      ['color_name' => 'Strawberry', 'color_image' => 'storage/text_colors/file_1720107114.png', 'text_color_code' => '#FC5A8D'],
      ['color_name' => 'Irish Green', 'color_image' => 'storage/text_colors/file_1720107011.png', 'text_color_code' => '#018749'],
      ['color_name' => 'Cerulean', 'color_image' => 'storage/text_colors/file_1732087767.png', 'text_color_code' => '#2A6F97'],
      ['color_name' => 'Charcoal', 'color_image' => 'storage/text_colors/file_1720107152.png', 'text_color_code' => '#36454F'],
      ['color_name' => 'Dark Brown', 'color_image' => 'storage/text_colors/file_1720106998.png', 'text_color_code' => '#4E3629'],
      ['color_name' => 'Radiant Red', 'color_image' => 'storage/text_colors/file_1720107083.png', 'text_color_code' => '#F03C39'],
      ['color_name' => 'Cocoa Mulch', 'color_image' => 'storage/text_colors/file_1720107182.png', 'text_color_code' => '#6B4F3B'],
      ['color_name' => 'Dark Army Green', 'color_image' => 'storage/text_colors/file_1720107185.png', 'text_color_code' => '#4B5320'],
      ['color_name' => 'Vanessa Purple', 'color_image' => 'storage/text_colors/file_1732087972.png', 'text_color_code' => '#7A3A6C'],
      ['color_name' => 'Blue', 'color_image' => 'storage/text_colors/file_1732087759.png', 'text_color_code' => '#0000FF'],
      ['color_name' => 'Warm Wine', 'color_image' => 'storage/text_colors/file_1720107122.png', 'text_color_code' => '#9B1B30'],
      ['color_name' => 'PN Navy', 'color_image' => 'storage/text_colors/file_1732087933.png', 'text_color_code' => '#2A3C5C'],
      ['color_name' => 'Midnight Navy', 'color_image' => 'storage/text_colors/file_1720107037.png', 'text_color_code' => '#003366'],
      ['color_name' => 'Black', 'color_image' => 'storage/text_colors/file_1720107146.png', 'text_color_code' => '#000000'],
    ];

    foreach ($colors as $color) {
      TextColor::create($color);
    }
  }
}