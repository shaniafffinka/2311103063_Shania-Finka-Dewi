
<?php for ($i = 1; $i <= 5; $i++) { echo "Angka ke-$i <br>"; } ?>

<?php
$x = 1;
while ($x <= 5) {
    echo "Jumlah ke- $x <br>";
    $x++;
}
?>

<?php
$buah = ["Apel", "Jeruk", "Mangga", "Pisang", "Jambu"];
foreach ($buah as $b) {
    echo "Buah: $b <br>";
}
?>