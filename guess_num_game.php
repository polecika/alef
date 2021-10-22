<?php
  if(isset($_POST["number"])) {
    //мы загадали число 3674
    $secret_num = '3674';
    $secret_num_arr = preg_split('//', $secret_num, -1, PREG_SPLIT_NO_EMPTY);
    //запускаем скрипт
    $number = strip_tags(htmlspecialchars($_POST["number"]));
    $number_arr = preg_split('//', $number, -1, PREG_SPLIT_NO_EMPTY);
    //найдем общие:
    $guessed_nums = array_intersect($secret_num_arr, $number_arr);
    $guessed_nums_count = count($guessed_nums);

    $good_num_place = 0;
    foreach ($number_arr as $key => $value) {
      if($value == $secret_num_arr[$key]) {
        $good_num_place++;
      }
    }
    if($good_num_place == 4) {
      $request = "Верно!";
    } elseif($guessed_nums_count == 0) {
      $request = "Не угадал, попробуй ещё раз!";
    }
     else {
       $word1 = $guessed_nums_count == 1 ? 'цифру' : 'цифры';
       $word2 = $good_num_place == 1 ? 'цифра' : 'цифры';
       $request = "угадал $guessed_nums_count $word1, из них на своем месте $good_num_place $word2";
     }

    echo json_encode(['success' => true, 'responseText' => $request]);

  } else {
    ?>
    <p>Я загадала число :) Отгадаешь?</p>
    <form class="form" onsubmit="return false;">
    <input class="form-control" max="9999" id="form-number" type="number" name="number">
    <button class="btn-primary btn" id="form-subbmit">
      Проверить
    </button>
    </form>
    <p class="lead" id="result"></p>
    <script>
      $('#form-subbmit').click( function() {
        var number = $('#form-number').val();
        if(number != "") {
          if(number < 1000 || number > 9999) {
            $('#result').text("Это четырехзначное число, попробуйте ещё раз!")
            .addClass('text-danger');
          } else {
            $.ajax({
              method: 'post',
              url: 'guess_num_game.php',
              dataType : "json",
              data : {'number' : number },
              async: false
            }).done(function(data){
            $('#result').text(data.responseText);
          }).fail(function(data){
          $('#result').text("Упс! Что то пошло не так");
        })
          }
        } else {
          $('#result').text("Введите число")
          .addClass('text-danger');
        }

      });
    </script>
    <?php
  }
?>
