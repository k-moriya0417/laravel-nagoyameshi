<?php

namespace App\Admin\Controllers;

use App\Models\Restaurant;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RestaurantController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Restaurant';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Restaurant());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('category_id', __('Category id'));
        $grid->column('img', __('Img'));
        $grid->column('business_hours', __('Business hours'));
        $grid->column('address', __('Address'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Restaurant::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('category_id', __('Category id'));
        $show->field('img', __('Img'));
        $show->field('business_hours', __('Business hours'));
        $show->field('address', __('Address'));
        $show->field('phone_number', __('Phone number'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Restaurant());

        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->number('category_id', __('Category id'));
        $form->image('img', __('Img'));
        $form->text('business_hours', __('Business hours'));
        $form->text('address', __('Address'));
        $form->text('phone_number', __('Phone number'));

        return $form;
    }
}
