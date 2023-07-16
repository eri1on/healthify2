<?php
namespace App\Http\Traits;




trait DietCalculationsTrait{




    public function calculatePersonalizedCalories($user,$TCalories)
    {
        $weight = $user->weight;
        $height = $user->height;
        $age = $user->age;
        $gender = $user->gender;
        $activity = $user->activity;
        $goal = $user->goal;
    
        // Calculate Basal Metabolic Rate (BMR) based on gender
        if ($gender == 'male') {
            $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
        } else {
            $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
        }
    
        // Apply activity factor to BMR
        $activityFactors = [
            'low_activity' => 1.2,
            'high_activity' => 1.725,
        ];
    
        $activityFactor = $activityFactors[$activity];
        $TCalories = $bmr * $activityFactor;
    
        // Adjust calories based on goal
        if ($goal == 'lose_weight') {
            $TCalories -= 500; // Subtract 500 calories for weight loss
        }elseif ($goal == 'gain_weight'){
            $TCalories += 500; // Add 500 calories for weight gain
        }
    
        return $TCalories;
    }
    



    public function calculateCarbohydratesGrams($calories){

        $carbo= $this->calculatePersonalizedCalories(auth()->user(),$calories);
        
        $carbohydratePercentage = 50;
        $carbohydrateRatio = $carbohydratePercentage / 100;
        $carbohydrateGrams = ( $carbo* $carbohydrateRatio) / 4;
        return $carbohydrateGrams;
    }
    
    public function calculateProteinGram($calories){
        $protein= $this->calculatePersonalizedCalories(auth()->user(),$calories);
    
        $proteinPercentage = 30;
        $proteinRatio = $proteinPercentage / 100;
        $proteinGrams = ($protein * $proteinRatio) / 4;
        return $proteinGrams;
    }



}


?>