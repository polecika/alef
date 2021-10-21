<?php
$numbers_array =  [
  [399, 9160, 144, 3230, 407, 8875, 1597, 9835],
  [2093, 3279, 21, 9038, 918, 9238, 2592, 7467],
  [3531, 1597, 3225, 153, 9970, 2937, 8, 807],
  [7010, 662, 6005, 4181, 3, 4606, 5, 3980],
  [6367, 2098, 89, 13, 337, 9196, 9950, 5424],
  [7204, 9393, 7149, 8, 89, 6765, 8579, 55],
  [1597, 4360, 8625, 34, 4409, 8034, 2584, 2],
  [920, 3172, 2400, 2326, 3413, 4756, 6453, 8],
  [4914, 21, 4923, 4012, 7960, 2254, 4448, 1]
];
$prime_numbers = [];
$prime_numbers_sum = 0;

/**
 * [find_prime_numbers description]
 * @param  array  $arr                     [description]
 * @param  array  $prime_arr               [description]
 * @return [type]            [description]
 */
function find_prime_numbers(array $arr, array $prime_arr = [])
{
  foreach ($arr as $value) {
      if(is_array($value)) {
        $prime_arr = find_prime_numbers($value, $prime_arr);
        //123
      } else {
         if(is_numeric($value) && is_prime($value)) {
           $prime_arr[] = $value;
         }
       }
  }
  return $prime_arr;
}

/**
 * [is_prime description]
 * @param  [type]  $number               [description]
 * @return boolean         [description]
 */
function is_prime($number)
{
        if ($number==2)
                return true;
	if ($number%2==0)
		return false;
	$i=3;
	$max_factor = (int)sqrt($number);
	while ($i<=$max_factor){
		if ($number%$i == 0)
			return false;
		$i+=2;
	}
	return true;
}

$prime_numbers_sum = array_sum(find_prime_numbers($numbers_array));
printf("<p>Дан массив: %s</p>", print_r($numbers_array, true));
echo '<p class="lead"> Сумма всех простых чисел: '.$prime_numbers_sum.'</p>';
