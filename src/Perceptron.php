<?php

class Perceptron
{
    private $learnSpeed;

    private $weights;


    public function __construct(float $learnSpeed, int $weightCount)
    {
        $this->learnSpeed = $learnSpeed;

        // initial values of weights
        $this->weights = [];
        for ($i = 0; $i < $weightCount; $i++) {
            $this->weights[$i] = rand(-1, 1);
        }
    }

    public function feedForward($inputs)
    {
        $sum = 0;
        for ($i = 0; $i < count($this->weights); $i++) {
            $sum += $this->weights[$i] * $inputs[$i];
        }

        // normalize output
        return $sum > 0 ? 1 : -1;
    }

    public function train($inputs, $desiredOutput)
    {
        $guess = $this->feedForward($inputs);

        $error = $desiredOutput - $guess;

        // adjust weight according to error
        for ($i = 0; $i < count($this->weights); $i++) {
            $this->weights[$i] += $error * $inputs[$i] * $this->learnSpeed;
        }
    }

}