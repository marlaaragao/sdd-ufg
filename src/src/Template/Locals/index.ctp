<?php $this->assign('title', 'Locais'); ?>
<?php $this->start('breadcrumb'); ?>
    <li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
    <li class="active">Lista de locais</li>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Lista de locais</h3>
                <div class="pull-right box-tools">
                    <?= $this->Html->link(
                        '<i class="fa fa-plus-circle"></i> ' . __('Adicionar'),
                        ['action' => 'add'],
                        [
                            'escape' => false,
                            'data-toggle' => 'tooltip',
                            'data-original-title' => __('Adicionar'),
                            'class' => 'btn btn-sm btn-primary'
                        ]
                    );
                    ?>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id', __('#ID')) ?></th>
                            <th><?= $this->Paginator->sort('name', __('Nome')) ?></th>
                            <th><?= $this->Paginator->sort('address', __('Localização')) ?></th>
                            <th><?= $this->Paginator->sort('capacity', __('Capacidade')) ?></th>
                            <th width="200px"><?= __('Ações') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($locals->isEmpty()): ?>
                            <tr>
                                <td colspan="5" class="text-center">Não existe nenhuma local cadastrado</td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($locals as $local): ?>
                            <tr>
                                <td><?= $this->Number->format($local->id) ?></td>
                                <td><?= h($local->name) ?></td>
                                <td><?= h($local->address) ?></td>
                                <td><?= $this->Number->format($local->capacity) ?></td>
                                <td>
                                    <?= $this->Html->link(
                                        '',
                                        ['action' => 'view', $local->id],
                                        [
                                            'title' => __('Visualizar'),
                                            'class' => 'btn btn-sm btn-default glyphicon glyphicon-search',
                                            'data-toggle' => 'tooltip',
                                            'data-original-title' => __('Visualizar'),
                                        ]
                                    ) ?>
                                    <?= $this->Html->link(
                                        '',
                                        ['action' => 'edit', $local->id],
                                        [
                                            'title' => __('Editar'),
                                            'class' => 'btn btn-sm btn-primary glyphicon glyphicon-pencil',
                                            'data-toggle' => 'tooltip',
                                            'data-original-title' => __('Editar'),
                                        ]
                                    ) ?>
                                    <?= $this->Form->postLink(
                                        '',
                                        ['action' => 'delete', $local->id],
                                        [
                                            'confirm' => __('Você tem certeza de que deseja remover a local "{0}"?', $local->name),
                                            'title' => __('Remover'),
                                            'class' => 'btn btn-sm btn-danger glyphicon glyphicon-trash',
                                            'data-toggle' => 'tooltip',
                                            'data-original-title' => __('Remover'),
                                        ]
                                    ) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <?= $this->Paginator->prev('«') ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next('»') ?>
                </ul>
            </div>
        </div>
    </div>
</div>

