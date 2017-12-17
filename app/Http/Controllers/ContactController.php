<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Yajra\DataTables\Datatables;

use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "fungsi index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['photo'] = null;

       if ($request->hasFile('photo')){
            $input['photo'] = '/upload/photo/'.str_slug($input['email'], '-').'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/upload/photo/'), $input['photo']);
        }

        Contact::create($input);

         return response()->json([
            'success' => true,
            'message' => 'Contact Created'
        ]);


        // $data = [
        //     'name'=>$request->name,
        //     'email'=>$request->email
        // ];

        // return Contact::create($data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "fungsi show dengan id ".$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return $contact;
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
        $input = $request->all();
        $contact = Contact::findOrFail($id);
        $input['photo'] = $contact->photo;

        if ($request->hasFile('photo')){
            if (!$contact->photo == NULL){
                unlink(public_path($contact->photo));
            }
            $input['photo'] = '/upload/photo/'.str_slug($input['email'], '-').'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/upload/photo'), $input['photo']);
        }
            $contact->update($input);
             return response()->json([
            'success' => true,
            'message' => 'Contact Updated'
        ]);

        

        // $contact = Contact::find($id);
        // $contact->name = $request->name;
        // $contact->email = $request->email;
        // $contact->update();

        // return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

       $contact = Contact::findOrFail($id);
       if($contact->photo !=null) {
            unlink(public_path($contact->photo));
       }

       Contact::destroy($id);
       return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);


       // return Contact::destroy($id);
    }

    public function apiContact()
    {
        $contact = Contact::all();

        return Datatables::of($contact)

        // ->addColumn('show_photo', function($contact) {
        //     if($contact->photo == null) {
        //         return 'No Image';
        //     }
        //     return '<img class="rounded-square" width="50" height="50" src="'. url($contact->photo) . '" alt="">'
        // })

        ->addColumn('show_photo', function($contact){
                if ($contact->photo == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($contact->photo) .'" alt="">';
            })

        ->addColumn('action', function($contact){
                return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> ' .
                       '<a onclick="editForm('. $contact->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                       '<a onclick="deleteData('. $contact->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })->rawColumns(['show_photo', 'action'])->make(true);  
        
    }
}

