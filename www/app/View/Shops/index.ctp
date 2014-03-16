<?php echo $this->Html->link(
    'Add new shop',
    array('controller' => 'shops', 'action' => 'add')
); ?>
<table class="table table-striped">
    <tr class="info">
        <td class="info">Назва магазину</td>
        <td class="info">Посилання на сайт</td>
        <td class="info">Опис</td>
        <td class="info">Лого</td>
        <td class="info">Редагувати</td>
        <td class="info">Видалити</td>
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
                    <td>".$this->Html->link('Edit', array('action' => 'edit', $item['id']))."</td>
                    <td>".$this->Form->postLink(
                    'Delete',
                        array('action' => 'delete', $item['id']),
                        array('confirm' => 'Are you sure?'))
                    ."</td></tr>";
            }
        }
    ?>
    </tbody>
</table>
