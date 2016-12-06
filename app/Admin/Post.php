<?php


use App\Model\Post;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Post::class, function (ModelConfiguration $model) {
    /*App::setLocale('en');*/

    // Display
    $model->setTitle(Lang::get('news.title'));

    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setOrder([[1, 'desc']]);
        $display->setApply(function ($query) {
            $query->orderBy('created_at', 'asc');
        });

        $display->setHtmlAttribute('class', 'table-bordered table-success table-hover');

        $display->setColumns([
            AdminColumn::link('title')->setLabel('Заголовок'),
            AdminColumnEditable::checkbox('public')->setLabel('Опубликовать')
        ])->paginate(5);

        return $display;
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
