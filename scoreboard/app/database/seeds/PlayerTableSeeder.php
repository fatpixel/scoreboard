<?php

use Illuminate\Database\Seeder;

class PlayerTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('players')->delete();

        // WWE Hall-of-Famers
        Player::create(
            [
                'name' => 'The Ultimate Warrior',
                'highscore' => '555',
            ]
        );
        Player::create(
            [
                'name' => '"Hacksaw" Jim Duggan',
                'highscore' => '355',
            ]
        );
        Player::create(
            [
                'name' => '"Stone Cold" Steve Austin',
                'highscore' => '316',
            ]
        );
        Player::create(
            [
                'name' => 'André the Giant',
                'highscore' => '400',
            ]
        );
        Player::create(
            [
                'name' => 'Jim Ross',
                'highscore' => '350',
            ]
        );
    }
}
