<?php
function division($a,$b) {
    if($b == 0) {
        throw new Exception("You cant divide a number by 0!");
    }
    return $a / $b;
}
try {
    echo division(6,0);
} catch (Exception $e) {
    echo "Error! " . $e->getMessage();
}
?>