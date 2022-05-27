<?php

use App\Helpers\Container;
use App\Services\View;

$conference = Container::get('conference');
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
        </tbody>
    </table>

    <?php
    View::part('components/go_to_confs_btn');
    ?>

</div>

</body>
</html>
