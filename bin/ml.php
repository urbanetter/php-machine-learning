<?php

require __DIR__ . "/../src/Perceptron.php";

function isAboveTheLine(float $x, float $candidate)
{
    $line = .5 * $x + 10;
    return ($candidate >= $line) ? 1 : -1;
}

$perceptron = new Perceptron(0.01, 3);

echo "Training model";
for ($i = 0; $i < 9000000; $i++) {
    // get random x and y coordinates between -250 and 250
    $x = rand(-250, 250);
    $y = rand(-250, 250);

    // is y below or above the line? -1 is below, 1 is above
    $correctResult = isAboveTheLine($x, $y);

    $perceptron->train([$x, $y, 1], $correctResult);

}
echo "\n";

echo "Trained model result for point -7, 9: " . $perceptron->feedForward([-7, 9, 1]) . " correct is " . isAboveTheLine(-7, 9) . "\n";
echo "Trained model result for point 3, 1: " . $perceptron->feedForward([3, 1, 1]) . " correct is " . isAboveTheLine(3, 1) . "\n";
echo "Trained model result for point 4, 12: " . $perceptron->feedForward([4, 12, 1]) . " correct is " . isAboveTheLine(4, 12) . "\n";

echo "x = 4, y on line: 12\n";
foreach (range(8, 16) as $y) {
    echo "For x=4, y=$y: " . $perceptron->feedForward([4, $y, 1]) . "\n";
}

echo "\n";

