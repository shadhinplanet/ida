<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\LoanerInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoanController extends Controller
{


    public function index()
    {
        return view('backend.loan.index')->with([
            'loans' => Loan::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('backend.loan.create');
    }
    public function store(Request $request)
    {
        if($request->clientType == 'new'){
            $request->validate([
                'name'          => 'required|max:100',
                'fathersName'   => 'required|max:100',
                'nid'           => 'required',
                'email'         => 'required|max:255|email',
                'phone'         => 'required',
                'businessType'  => 'required|not_in:none',
                'loanAmount'    => 'required|integer',
                'loanDate'      => 'required',
                'returnAmount'  => 'required|integer',
                'returnDate'    => 'required',
            ]);

            $thumb = null;

            if(!empty($request->file('thumbnail'))){
                $thumb = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
                $thumb = str_replace(' ','-',$thumb);
                $request->file('thumbnail')->storeAs('public/uploads/clients', $thumb);
            }

            $user = User::create([
                'name'    => $request->name,
                'email'   => $request->email,
                'password'=> Hash::make(Str::random(8)),
                'phone'   => $request->phone,
                'image'   => $thumb,
                'role'    => 'client',
                'status'  => 'active',
            ]);

            // Event create with email send and reset password link

            $loan = Loan::create([
                'loan_amount'       => $request->loanAmount,
                'loan_date'         => $request->loanDate,
                'received_amount'   => $request->returnAmount,
                'received_date'     => $request->returnDate,
                'user_id'           => $user->id,
            ]);

            LoanerInformation::create([
                'user_id'   => $user->id,
                'loan_id'   => $loan->id,
                'address'   => $request->address,
                'nid'   => $request->nid,
                'business_category'   => $request->businessType,
            ]);


            // Event -  email send with loan details

        }

        return redirect()->route('loan.index')->with('success','Loan Created');
    }

}
