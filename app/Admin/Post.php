<?php

use App\Model\Post;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Post::class, function (ModelConfiguration $model) {
    $model->setTitle('Форум')->setAlias('forum');

    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-primary');
        $display->setOrder([[1, 'desc']]);

        $display->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок')->setOrderable(false),
            AdminColumn::text('preview')->setLabel('Краткое описание')->setWidth('300 px;')->setOrderable(false),
            AdminColumn::datetime('created_at')->setLabel('Дата создания')->setFormat('d.m.Y H:i:s')->setWidth('150px'),
            AdminColumn::text('likes')->setLabel('Лайки')->setWidth('80 px'),
            AdminColumn::text('dislikes')->setLabel('ДизЛайки')->setWidth('80 px'),
        ]);

        return $display;
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        $form = AdminForm::panel()
            ->addBody([
                AdminFormElement::text('title', 'Заголовок темы')->required(),
                AdminFormElement::textarea('preview', 'Краткое описание')->required(),
            ])->addBody([
                AdminFormElement::wysiwyg('content', 'Описание темы')->setEditor('tinymce'),
            ]);

        $form->getButtons()
            ->setSaveButtonText('Сохранить тему')
            ->hideSaveAndCloseButton();

        return $form;
    });
})->addMenuPage(Post::class)->setIcon('fa fa-newspaper-o');
