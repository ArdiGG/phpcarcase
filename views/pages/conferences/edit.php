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
                <div class="form-group mb-2" style="display: none">
                    <input type="text" name="address" class="form-control w-50 address" id="formGroupExampleInput2"
                    placeholder="Address" value="<?php echo $conference['address'] ?>">
                </div>
                <div>
                    <div class="currentCountry" value="<?php echo $conference['country'] ?>"></div>
                    <label for="formGroupExampleInput">Страна</label><br>
                    <select name="country" style="width: 250px" id="sel" class="form-select countries">
                        <option value="default">Выберите страну</option>
                    </select>
                </div>
                <label for="formGroupExampleInput2" class="mt-2">Адресс</label>
                <div id="map"></div>
                <div class="mt-2">
                    <input class="btn btn-success mt-2" type="submit" value="Сохранить">
                    <?php
                    View::part('components/go_to_confs_btn');
                    ?>

                </div>
            </form>
            <a href="delete">
                <button class="btn btn-danger mt-2">Удалить</button>
            </a>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../assets/js/countries.js"></script>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrckLvAQiE9dGQ9klXIfQUVjy8lWKS34g"></script>
<script type="text/javascript" src="../../../assets/js/index.js"></script>

</body>
</html