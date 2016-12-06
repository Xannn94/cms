<?php

use App\Model\Page;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Page::class, function (ModelConfiguration $model) {
    /*App::setLocale('ru');*/
    $model->setTitle(Lang::get('pages.title'));
    // Display
    $model->onDisplay(function () {
       $display = AdminDisplay::tree()->setValue('title');

       $display->setApply(function ($query) {
            $query->where('lang', Lang::getLocale());
       });

      return $display;
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
