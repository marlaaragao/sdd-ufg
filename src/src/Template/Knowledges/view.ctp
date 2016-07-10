<?php $this->assign('title', 'Núcleo de conhecimento: '.$knowledge->name); ?>
<?php $this->start('breadcrumb'); ?>
<li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
<li><?= $this->Html->link(__('Núcleos de conhecimento'), ['action' => 'index']) ?></li>
<li class="active"><?= $knowledge->name ?></li>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Informações do núcleo de conhecimento</h3>
                <div class="pull-right box-tools">
                    <?= $this->Html->link(
                        __('Editar'),
                        ['action' => 'edit', $knowledge->id],
                        [
                            'data-toggle' => 'tooltip',
                            'data-original-title' => __('Editar'),
                            'class' => 'btn btn-sm btn-primary'
                        ]
                    );
                    ?>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped table-valign-middle">
                    <tr>
                        <th><?= __('#ID') ?></th>
                        <td><?= $this->Number->format($knowledge->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Nome') ?></th>
                        <td><?= h($knowledge->name) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Docentes facilitadores</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                        <th><?= __('#ID') ?></th>
                        <th><?= __('Nome') ?></th>
                        <th><?= __('Matrícula') ?></th>
                        <th><?= __('Formação') ?></th>
                        <th width="200px"><?= __('Ações') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($knowledge->facilitators)): ?>
                        <tr>
                            <td colspan="6" class="text-center">Esse núcleo de conhecimento não possui nenhum docente facilitador.</td>
                        </tr>
                    <?php else: ?>
                    <?php foreach ($knowledge->facilitators as $facilitator): ?>
                        <tr>
                            <td><?= h($facilitator->teacher->id) ?></td>
                            <td><?= h($facilitator->teacher->user->name) ?></td>
                            <td><?= h($facilitator->teacher->registry) ?></td>
                            <td><?= h($facilitator->teacher->formation) ?></td>
                            <td>
                                <?= $this->Html->link(
                                    '',
                                    ['controller' => 'Teachers', 'action' => 'view', $facilitator->teacher->id],
                                    [
                                        'title' => __('Visualizar'),
                                        'class' => 'btn btn-sm btn-default glyphicon glyphicon-search',
                                        'data-toggle' => 'tooltip',
                                        'data-original-title' => __('Visualizar'),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Disciplinas associadas</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                        <th><?= __('#ID') ?></th>
                        <th><?= __('Nome') ?></th>
                        <th><?= __('Curso') ?></th>
                        <th width="200px"><?= __('Ações') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($knowledge->subjects)): ?>
                        <tr>
                            <td colspan="6" class="text-center">Esse núcleo de conhecimento não possui nenhuma disciplina associada.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($knowledge->subjects as $subject): ?>
                            <tr>
                                <td><?= h($subject->id) ?></td>
                                <td><?= h($subject->name) ?></td>
                                <td><?= h($subject->course->name) ?></td>
                                <td>
                                    <?= $this->Html->link(
                                        '',
                                        ['controller' => 'Subjects', 'action' => 'view', $subject->id],
                                        [
                                            'title' => __('Visualizar'),
                                            'class' => 'btn btn-sm btn-default glyphicon glyphicon-search',
                                            'data-toggle' => 'tooltip',
                                            'data-original-title' => __('Visualizar'),
                                        ]
                                    ) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
