<?php

namespace App\Http\Controllers\Contact;
use App\Http\Controllers\Controller;
use App\Model\contactPerson;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\DB;

class ContactPersonController extends Controller
{use ApiResponse;
    public function show(contactPerson $contactPerson)
    {
        //
    }

    
    public function edit($contactPerson)
    {
        //dd($contactPerson);
        $contactPerson=contactPerson::with('Supplier')->find($contactPerson);
        return $this->success($contactPerson);
    }

    
    public function update(Request $request, $contactPerson)
    {
        $contactPerson=contactPerson::find($contactPerson);
        DB::beginTransaction();
            try {
                    $contactPerson->name=$request->name;
                    $contactPerson->mobile=$request->mobile;
                    $contactPerson->email=$request->email;
                    $contactPerson->designation=$request->designation;
                    //$contactPerson->type_id=$supplier->id;
                    $contactPerson->type=$request->type;;
                    $contactPerson->update();
                    DB::commit();
                return $this->success($contactPerson);
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }
    }

    
    public function destroy($contactPerson)
    {
        $contactPerson=contactPerson::findOrFail($contactPerson);
        $contactPerson->delete();
        return $this->success($contactPerson);
    }
}
