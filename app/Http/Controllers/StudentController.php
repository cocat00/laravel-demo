<?php
/**
 * Created by PhpStorm.
 * User: chenjie
 * Date: 2018/7/6
 * Time: 上午10:27
 */

namespace App\Http\Controllers;

use App\Student;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends Controller {
    //学生列表页
    public function index () {
        $students = Student::paginate(5);

        return view('student.index', [
            'students' => $students,
        ]);
    }

    //添加界面
    public function create () {
        return view('student.create');
    }

    //保存添加
    public function save(Request $request) {
        if ($request->isMethod('POST')) {

//            //控制器验证
//            $this->validate($request, [
//                'Student.name' => 'required|min:2|max:20',
//                'Student.age' => 'required|integer',
//                'Student.sex' => 'required|integer',
//            ], [
//                'required' => ':attribute 为必填项',
//                'min' => ':attribute 长度不符合要求',
//                'integer' => ':attribute 必须为整数',
//            ], [
//                'Student.name' => '姓名',
//                'Student.age' => '年龄',
//                'Student.sex' => '性别',
//            ]);

            $validator = \Validator::make($request->input(), [
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ], [
                'Student.name' => '姓名',
                'Student.age' => '年龄',
                'Student.sex' => '性别',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->input('Student');

            $student = new Student();
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->age = $data['age'];

            if ($student->save()) {
                return redirect('student/index')->with('success', '添加成功!');
            } else {
                return redirect()->back();
            }
        }
    }

    public function update(Request $request, $id) {

        $student = Student::find($id);

        if ($request->isMethod('POST')) {
            $data = $request->input('Student');

            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->age = $data['age'];
            if ($student->save()) {
                return redirect('student/index')->with('success', '修改成功-' . $id . ' !');
            } else {
                return redirect()->back();
            }
        }

        return view('student.update', [
            'student' => $student
        ]);
    }
}