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
                Страна
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
            <td>
                <?php echo $conference['country'] ?>
            </td>
            <input class="address" style="display: none" disabled value="<?php echo $conference['address'] ?>">
        </tr>
        </tbody>
    </table>
    <?php if ($conference['address'] != '') { ?>
        <div id="map"></div>
    <?php } ?>
    <?php
    View::part('components/go_to_confs_btn');
    ?>
    <a href="<?php echo $conference['id']?>/delete">
        <button class="btn btn-danger mt-2">Удалить</button>
    </a>

    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrckLvAQiE9dGQ9klXIfQUVjy8lWKS34g"></script>
    <script type="text/javascript" src="../../../assets/js/index.js"></script>
</div>

</body>
</html>
