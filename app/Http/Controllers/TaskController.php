<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Table\Table;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class TaskController extends Controller
{

    public function store(Request $request){
        // dd($request);
        /*DB::table('tasks')->insert([
            'name' =>$request->name,
            'created_at' => now(),
            'updated_at'=>now()
        ]);
        */
        $task =new Task();

        $task->name =$request->name;
        $task->save();
        return redirect()->back();
    }
    public function index (){
       // $tasks = DB::table('tasks')->get();
       $tasks =Task::where('id','>','5')->get();
        return view('index',compact('tasks'));
    }

    

    public function update(Request $request, $id)
    {
        $task = DB::table('tasks')->find($id);
        $task->name = $request->input('name');
        $task->update(['name'=>$task->name]);

       return redirect('')->with('Updated successfully!');
    }
    public function destroy($id){
        ///DB::table('tasks')->where ('id',$id )->delete();
        Task::where('id',$id)->delete();
        return redirect()->back();

    }
    public function edit($id){
        $tasks = DB::table('tasks')->where('id', '=', $id)->find($id);
        return view('edit', compact('tasks'));

    }

}

