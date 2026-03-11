<?php
function division(int $a, int $b) {
    if($b == 0) {
        throw new Exception("You cant divide a number by 0!");
    }
    return $a / $b;
}

echo division(6,2) . "\n";

try {
    echo division(6,0);
} catch (Exception $e) {
    echo "Error! " . $e->getMessage();
}
?>