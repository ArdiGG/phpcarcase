<?php

use App\Helpers\Container;
use App\Services\View;

$conference = Container::get('conference');
$datetime = explode(' ', $conference['date']);

View::part('layouts/master');
?>

<div class="container">
    <div class="justify-content-center" style="margin-left: 30px">
        <div>
            <h3>Для создания конференции введите следующие данные:</h3>
        </div>
        <div class="panel">
            <form action="/conferences/<?php echo $conference['id'] ?>/update" method="POST">
                <div class="form-group">
                    <label for="formGroupExampleInput">Название Конференции</label>
                    <input type="text" name="title" class="form-control w-25" id="formGroupExampleInput"
                           placeholder="Title" value="<?php echo $conference['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Дата</label><br>
                    <input type="date" name="date" class="form-control w-25 d-inline" id="formGroupExampleInput"
                           placeholder="Date" value="<?php echo $datetime[0]; ?>">
                    <input type="time" name="time" value="<?php echo $datetime[1] ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Адресс</label>
                    <input type="text" name="address" class="form-control w-50" id="formGroupExampleInput2"
                           placeholder="Address" value="<?php echo $conference['address'] ?>">
                </div>
                <input class="btn btn-success mt-2" type="submit" value="Сохранить">
                <?php
                View::part('components/go_to_confs_btn');
                ?>
            </form>

        </div>
    </div>
</div>
