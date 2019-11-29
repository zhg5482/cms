<?php

namespace App\Admin\Controllers;

use App\Employee;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EmployeeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '会员管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Employee);

        // 不显示 ID 列
        //$grid->id('ID');^M

        $grid->number('工号');
        $grid->name('姓名');
        $grid->mail('邮箱');

        // 隐藏密码列
        //$grid->password('Password');^M

        $grid->department('部门');

        $grid->filter(function($filter){

        // 去掉默认的 id 过滤器
        $filter->disableIdFilter();

        // 添加新的字段过滤器（通过工号过滤）
        $filter->like('number', '工号');
    });

    return $grid;

//        $grid = new Grid(new Employee);
//
//        $grid->column('id', __('Id'));
//        $grid->column('number', __('Number'));
//        $grid->column('name', __('Name'));
//        $grid->column('mail', __('Mail'));
//        $grid->column('password', __('Password'));
//        $grid->column('department', __('Department'));
//
//        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Employee::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('number', __('Number'));
        $show->field('name', __('Name'));
        $show->field('mail', __('Mail'));
        $show->field('password', __('Password'));
        $show->field('department', __('Department'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Employee);

        $form->number('number', __('Number'));
        $form->text('name', __('Name'));
        $form->email('mail', __('Mail'));
        $form->password('password', __('Password'));
        $form->text('department', __('Department'));

        return $form;
    }
}
