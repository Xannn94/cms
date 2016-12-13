<?php

use App\Role;
use App\User;
use App\Model\Ticket;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(User::class, function (ModelConfiguration $model) {
    $model->setTitle('Пользователи')/*->enableAccessCheck()*/;

    // Display
    $model->onDisplay(function () {
        return AdminDisplay::table()
            ->with('roles')
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::link('name')->setLabel('Username'),
                AdminColumn::email('email')->setLabel('Email')->setWidth('150px'),
                AdminColumn::lists('roles.label')->setLabel('Роль')->setWidth('200px'),
                AdminColumn::count('tickets')
                    ->setLabel('Количество билетов')
                    ->setWidth('50px')
                    ->append(
                        AdminColumn::filter('user_id')->setModel(new Ticket())
                    ),
            ])->paginate(20);
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Имя')->required(),
            AdminFormElement::password('password', 'Пароль')->required()->addValidationRule('min:6'),
            AdminFormElement::text('email', 'E-mail')->required()->addValidationRule('email'),
            AdminFormElement::multiselect('roles', 'Роли')->setModelForOptions(new Role())->setDisplay('name'),
            AdminFormElement::upload('avatar', 'Аватар')->addValidationRule('image'),
            AdminColumn::image('avatar')->setWidth('150px'),
        ])->setHtmlAttribute('enctype','multipart/form-data');
    });
});