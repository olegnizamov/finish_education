<table class="table table-striped">
    <?php
    foreach ($this->models as $model):?>
        <?php $row = array_map(function (callable $fn) use ($model) {
            return $fn($model);
        }, $this->functions);
        ?>
        <tr>
            <?php foreach ($row as $column): ?>
                <td><?= $column ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
