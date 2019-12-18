<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use DB;

class BookController extends Controller
{
    public function allBook(){
//        $allBook = User::select('*')->paginate(4);
        $allBook = User::all();
//        return response()->json($allBook);
        return view('book.allBook', compact('allBook'));
    }

    public function searchBook($search){
        $allBook = User::select('*')
            ->where('id', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->get();
        return view('book.allBook', compact('allBook'));
    }

    public function test(){
        $users = User::select(
                DB::raw('permission as permission'),
                DB::raw('count(*) as number'))
            ->groupBy('permission')
            ->get();
        $array[] = ['Permission', 'Number'];
        foreach ($users as $user => $value)
        {
            if ($value->permission == 1){
                $array[++$user] = ['Admin', $value->number];
            } else {
                $array[++$user] = ['User', $value->number];
            }
        }
        // return $users;
        return view('book.test')->with('permission', json_encode($array));
    }

    public function chartsTest() {
        return view('chartsTest');
    }

    public function ownChart() {
        $students = DB::table('class')->select('class_name', 'student', 'year')->get();
        // return $students;
        return view('ownCharts', compact('students'));
    }
}
