<?php

use App\Model\Post;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Post::class, function (ModelConfiguration $model) {
    // Display
    $model->setTitle('Новости');

    $model->onDisplay(function () {
        return AdminDisplay::table()->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок'),
            AdminColumnEditable::checkbox('public')->setLabel('Опубликовать')
        ])->paginate(5);
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::form()->setItems([
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::wysiwyg('text', 'Text', 'ckeditor')->required()->setFilteredValueToField('text_html'),
            AdminFormElement::checkbox('public','Опубликовать'),
        ]);
    });
})->addMenuPage(Post::class)->setIcon('fa fa-newspaper-o');
