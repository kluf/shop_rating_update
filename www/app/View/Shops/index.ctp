<table class="table table-striped">
    <tr class="info">
        <td class="info">Назва магазину</td>
        <td class="info">Посилання на сайт</td>
        <td class="info">Опис</td>
        <td class="info">Лого</td>
    </tr>
    <tbody>
    <?php
        foreach ($shops as $shop) {
            foreach ($shop as $item) {
                echo "<tr>
                    <td>".$item['name']."</td>
                    <td><a href='http://www.{$item['siteUrl']}'>".$item['siteUrl']."</td>
                    <td>".$item['description']."</td>
                    <td>".$item['logo']."</td>
                </tr>";
            }
        }
    ?>
    </tbody>
</table>
