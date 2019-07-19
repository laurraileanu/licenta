<?php

namespace App\Admin\Controllers;

use App\WorkDay;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WorkingDaysController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\WorkDay';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WorkDay);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Nume'));
        $grid->column('from', __('Ora start'))->editable();
        $grid->column('to', __('Ora sfarsit'))->editable();
        $grid->disableCreateButton();
        $grid->disableRowSelector();
        $grid->actions(function ($actions) {
            $actions->disableDelete();
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(WorkDay::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Nume'));
        $show->field('from', __('Ora start'));
        $show->field('to', __('Ora sfarsit'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WorkDay);

        $form->text('name', __('Nume'));
        $form->text('from', __('Ora start'));
        $form->text('to', __('Ora sfarsit'));

        return $form;
    }
}
