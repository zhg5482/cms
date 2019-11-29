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
        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableEdit();
            $actions->disableDelete();
        });


        // 设置text、color、和存储值
//        $states = [
//            'on'  => ['value' => 1, 'text' => '打开', 'color' => 'primary'],
//            'off' => ['value' => 2, 'text' => '关闭', 'color' => 'default'],
//        ];
//        $grid->status('状态')->switch($states);


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
        $show = new Show(Employee::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('number', __('Number'));
        $show->field('name', __('Name'));
        $show->field('mail', __('Mail'));
        $show->field('password', __('Password'));
        $show->field('department', __('Department'));
        $show->panel()
            ->tools(function ($tools) {
                $tools->disableEdit();
                $tools->disableList();
                $tools->disableDelete();
            });;
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

        $form->tools(function (Form\Tools $tools) {

            // 去掉`删除`按钮
            $tools->disableDelete();

            // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            $tools->add('<a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;delete</a>');
        });
        return $form;
    }
}
