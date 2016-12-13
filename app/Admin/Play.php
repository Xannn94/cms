<?php

use App\Model\Play;
use App\Model\Ticket;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Play::class, function (ModelConfiguration $model) {
    $model->setTitle('Розыгрыши');

    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::table();
      /*  $display->setOrder([[1, 'desc']]);*/
        $display->setHtmlAttribute('class', 'table-bordered table-primary table-hover table-th-color-black');
        $display->setApply(function ($query) {
            $query->orderBy('order', 'asc');
        });

        $display->setColumns([
            AdminColumn::link('title')->setLabel('Название')->setWidth('200 px')->setOrderable(false),
            AdminColumn::datetime('created_at')->setLabel('Дата создания')->setFormat('d.m.Y H:i:s')->setWidth('150px'),
            AdminColumn::datetime('finished_at')->setLabel('Дата розыгрыша')->setFormat('d.m.Y H:i:s')->setWidth('160px'),
            AdminColumn::text('price')->setLabel('Цена в тикетах')->setWidth('150 px;'),
            AdminColumn::count('tickets')
                ->setLabel('Вложенно билетов')
                ->setWidth('170px')
                ->append(
                    AdminColumn::filter('play_id')->setModel(new Ticket())
                ),
            AdminColumnEditable::checkbox('public')->setLabel('Опубликовать')->setWidth("100 px"),
            AdminColumn::order()
                ->setLabel('Позиция')
                ->setHtmlAttribute('class', 'text-center')
                ->setWidth('100px'),
        ]);

        return $display;
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        $form = AdminForm::panel()
            ->addBody([
                AdminFormElement::text('title', 'Название')->required('Поле обязательно для заполнения'),
            ])->addBody([
                AdminFormElement::wysiwyg('description', 'Описание темы')->required('Поле обязательно для заполнения'),
            ])->addBody([
                AdminFormElement::upload('main_image', 'Картинка')
                    ->addValidationRule('image'),
                AdminFormElement::text('price','Цена в тикетах'),
                AdminFormElement::checkbox('public','Опубликовать'),
            ])->setHtmlAttribute('enctype','multipart/form-data');

        $form->getButtons()
            ->setSaveButtonText('Сохранить тему')
            ->hideSaveAndCloseButton();

        return $form;
    });
})->addMenuPage(Play::class)->setIcon('fa fa-newspaper-o');
