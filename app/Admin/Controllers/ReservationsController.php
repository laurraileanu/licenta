<?php

namespace App\Admin\Controllers;

use App\Reservation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReservationsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Rezervari';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reservation);

        $grid->column('id', __('Id'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('first_name', __('First name'));
        $grid->column('last_name', __('Last name'));
        $grid->column('guests', __('Guests'));
        $grid->column('notes', __('Notes'));
        $grid->column('from', __('From'));
        $grid->column('to', __('To'));
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
        $show = new Show(Reservation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('guests', __('Guests'));
        $show->field('notes', __('Notes'));
        $show->field('from', __('From'));
        $show->field('to', __('To'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Reservation);

        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->textarea('notes', __('Notes'));

        return $form;
    }
}
