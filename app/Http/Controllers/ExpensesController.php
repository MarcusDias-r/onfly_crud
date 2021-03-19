<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Expense::orderBy('id','DESC')->get();
        $users   = User::all();
        return view('expenses_list',['records' => $records, 'users' => $users]);
    }

    public function redirect()
    {
        return redirect()->route('despesas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register_expense');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'description' => 'required|string',
            'value'       => 'required',
            'image'       => 'max:8000|mimes:jpg,png,jpeg',
        ];

        $message = [
            'description.required' => 'Defina uma descrição para à despesa',
            'value.required'       => 'Informe o valor da despesa',
            'image.size'            => 'O tamanho da imagem não poderá exceder 8mb',
            'image.mimes'           => 'Apenas os formatos jpg, png e jpeg são suportados',
        ];

        $request->validate($rules, $message);

        $expense = new Expense();
        $expense->description = $request->description;
        $expense->value       = str_replace(",", ".", str_replace(".","", $request->value));
        $expense->user_id     = Auth::user()->id;
        
        if(isset($request->image)){
            $file      = $request->allFiles()['image'];
            $file_name = uniqid('img_').'.'.$file->extension();
            $path      = $request->image->storeAs('public/images',$file_name);
            
        $expense->image = $file_name;
        }

        $expense->save();
        return redirect()->route('despesas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Expense::where('id', $id)->first();
        $user = User::where('id', $data->user_id)->first();

        return view('expense_details', ['data' => $data, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Expense::where('id',$id)->first();

        return view('edit_expense', ['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $rules = [
            'description' => 'required|string',
            'value'       => 'required',
            'image'       => 'max:8000|mimes:jpg,png,jpeg',
        ];

        $message = [
            'description.required' => 'Defina uma descrição para à despesa',
            'value.required'       => 'Informe o valor da despesa',
            'image.size'           => 'O tamanho da imagem não poderá exceder 8mb',
            'image.mimes'          => 'Apenas os formatos jpg, png e jpeg são suportados',
        ];

        $request->validate($rules, $message);

        Expense::where('id', $id)
            ->update([
                'description' => $request->description,
                'value'       => str_replace(",", ".", str_replace(".","", $request->value))
        ]);

        if($request->image)
        {
            $request->image->storeAs('public/images',$request->img_name);
        }

        return redirect()->route('despesas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expense::where('id', $id)->delete();
        
        return redirect()->route('despesas.index');
    }
}
