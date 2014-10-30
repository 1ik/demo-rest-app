<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();


		foreach(range(1, 10) as $index)
		{
			$odd = $index % 2;
			Student::create([
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'email' => $faker->email,
				'age'	=> $faker->numberBetween(10,28),
				'gender' => $odd? 'f' : 'm'
			]);
		}
	}

}