<p>Сумма всех чисел от 1 до 1000, где цифры в числе не повторяются, равна:</p>
<p class="lead">
  <?php
    $mega_sum = 0;
    for($i=1; $i<=1000; $i++) {
      $i_arr = str_split($i);
      $i_count = count($i_arr);
      if($i_count > 1 && $i_count == count(array_unique($i_arr))) {
        $mega_sum+=$i;
      }
    }
    echo $mega_sum;
  ?>
</p>
