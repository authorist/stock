<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Stock;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Stock::class;
    public function definition()
    {
        $units=['Adet','KG','Koli'];
        $furniture = ['Table','Chair','Eraser','Pen','Book','Bag'];
        return [

            
            'barcodeNumber' => $this->faker->unique()->isbn13(),
            'processDate' => $this->faker->dateTimeInInterval('-3 months', '-3 days'),
            'productName' => $furniture[rand(0,5)],
            'unit' => $units[rand(0,2)],
            'quantity' => $this->faker->unique()->randomNumber(3, false),
            'description' => $this->faker->text(200),
            'criticalAmount' => $this->faker->unique()->randomNumber(1,false),
            'currentStock' =>$this->faker->unique()->randomNumber(3, false),
            'companyName' => $this->faker->company(),
            'phone' =>$this->faker->numerify('05##-###-##-##'),
            'email' => $this->faker->unique()->safeEmail(),


        ];
    }


    
}
