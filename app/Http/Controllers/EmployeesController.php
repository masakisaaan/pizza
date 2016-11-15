<?php
/**
 *
 *  従業員用ページ
 *      ・従業員一覧ページ
 *      ・従業員編集ページ
 *      ・従業員追加ページ
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EmployeesController extends Controller
{
    //  従業員一覧ページ
    public function employeeList()  {
        return view('pizzzzza/employee.list');
    }

    //  従業員編集ページ
    public function employeeEdit()  {
        return view('pizzzzza/employee.edit');
    }

    //  従業員追加ページ
    public function employeeAdd()  {
        return view('pizzzzza/employee.add');
    }
}
