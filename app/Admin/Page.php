<?php

use App\Model\Page;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Page::class, function (ModelConfiguration $model) {
    $model->setTitle('Страницы');

    // Display
    $model->onDisplay(function () {
        return AdminDisplay::tree()->setValue('title');
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::form()->setItems([
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::ckeditor('text', 'Контент'),
            AdminFormElement::text('link', 'Ссылка'),
            AdminFormElement::checkbox('public','Опубликовать')
        ]);
    });
})->addMenuPage(Page::class)->setIcon('fa fa-sitemap');
