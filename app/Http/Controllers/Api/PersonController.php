<?php

namespace App\Http\Controllers\Api;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    

    public function index(){
        $persons = Person::all(['id', 'name']); 
    
        if ($persons->count() > 0) { 
            return response()->json([
                'person' => $persons
            ], 200);
        } else {
            return response()->json([
                'message' => 'No Record Found'
            ], 404);
        }
    }


    // create function

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                
                'errors' => $validator->messages(),
            ], 422);
        } else {
            // Check if the name already exists in the database
            $existingPerson = Person::where('name', $request->name)->first();
        
            if ($existingPerson) {
                return response()->json([
                    
                    'message' => "Person with the same name already exists",
                ], 422);
            } else {
                // Create the product if it doesn't exist
                $person = Person::create([
                    'name' => $request->name,
                    
                ]);
        
                if ($person) {
                    return response()->json([
                        
                        'message' => "Person created successfully",
                    ], 200);
                } else {
                    return response()->json([
                        
                        'message' => "Something went wrong",
                    ], 500);
                }
            }
        }
    }

    // read function

    public function read($user_id){
        $person = Person::find($user_id);
        if($person){

            $person = [
                'id' => $person->id,
                'name' => $person->name,
            ];

            return response()->json([
                
                'person' => $person
            ], 200);

        } else{
            return response()->json([
                
                'message' => "No such Name Found!"
            ], 400);
        }
    }

    

    // update function
    public function update(Request $request, int $id){
        $validator = Validator::make($request->only('name')
        , [
            'name' => 'required|string|max:191',
            
        ]);

        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else{

            $person = Person::find($id);
            if($person){

                $person->update([
                    'name' => $request->name,
                    
                ]);
               
                return response()->json([
                    
                    'message' => "Name Updated Successfully"
                ], 200);
            } else{
                
                return response()->json([
                    
                    'message' => "No Such Name Found!"
                ], 400);
            }
        }
    }

    //delete function

    public function destroy($id){
        $person = Person::find($id);

        if($person){
            $person->delete();
            return response()->json([
                
                'message' => "Person Deleted Successfully"
            ], 200);
        } else{
            return response()->json([
                'status' => 400,
                'message' => "No such Name Found!"
            ], 400);
        }
    }


}