<?php

use App\Helpers\Container;
use App\Services\View;

View::part('layouts/master');
?>
<div class="container">
    <table class="table">
        <tbody>
        <tr>
            <th>
                #
            </th>
            <th>
                Название
            </th>
            <th>
                Дата
            </th>
            <th>
                Адресс
            </th>
        </tr>
        <?php
        foreach (Container::get('conferences') as $conference) {
            ?>
            <tr>
                <td><?php echo $conference['id'] ?></td>
                <td>
                    <?php echo $conference['title'] ?>
                </td>
                <td>
                    <?php echo $conference['date'] ?>
                </td>
                <td><?php echo $conference['address'] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


<div class="justify-content-center" style="margin-left: 30px">
    <div>
        <h3>Для создания конференции введите следующие данные:</h3>
    </div>
    <div class="panel">
        <form action="/conferences/create" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Название Конференции</label>
                <input type="text" name="title" class="form-control w-25" id="formGroupExampleInput" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Дата</label><br>
                <input type="date" name="date" class="form-control w-25 d-inline" id="formGroupExampleInput"
                       placeholder="Date">
                <input type="time" name="time">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Адресс</label>
                <input type="text" name="address" class="form-control w-50" id="formGroupExampleInput2" placeholder="Address">
            </div>
            <input class="btn btn-success mt-2" type="submit" value="Создать">
        </form>
    </div>
</div>
</div>

</body>
</html>
