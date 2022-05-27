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
            <th>
                Действия
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
                <td>
                    <a href="conferences/<?php echo $conference['id']; ?>">
                        <button class="btn btn-success">Открыть</button>
                    </a>
                    <a href="conferences/<?php echo $conference['id']?>/edit">
                        <button class="btn btn-warning">Редактировать</button>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <a href="/conferences/create" class="link-primary">Создать конференцию</a>
</div>

</body>
</html>
