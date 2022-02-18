<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\User;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = Accounts::all();
        return view('admin.accounts', [
            'accounts' => $accounts
        ]);
    }

    public function add()
    {
        return view('admin.create-account');
    }

    public function post(Request $request)
    {
        $request->validate([
            'fname' => 'string|required',
            'lname' => 'string|required',
            'gender' => 'string|required',
            'address' => 'string|required'
        ]);

        //rand number
        function generateRandomString($length = 16)
        {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $accnum = generateRandomString();


        $checkAcc = Accounts::where('account_number', $accnum)->first();

        if (is_null($checkAcc)) {

            $acc = new Accounts();
            $acc->account_number = $accnum;
            $acc->fname = $request->fname;
            $acc->lname = $request->lname;
            $acc->address = $request->address;
            $acc->gender = $request->gender;
            $acc->save();

            return redirect()->back()->with('success', 'New account added successfully');
        } else {
            return redirect()->back()->with('error', 'Please try again!');
        }
    }

    public function editview($id)
    {
        $account = Accounts::find($id);

        return view('admin.edit-account', [
            'account' => $account
        ]);
    }

    public function delete($id)
    {
        Accounts::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Account has been deleted');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'fname' => 'string|required',
            'lname' => 'string|required',
            'gender' => 'string|required',
            'address' => 'string|required',
            'accnum' => 'string|required'
        ]);

        $acc = Accounts::where('account_number', $request->accnum)->first();
        $acc->fname = $request->fname;
        $acc->lname = $request->lname;
        $acc->address = $request->address;
        $acc->gender = $request->gender;
        $acc->save();

        return redirect()->back()->with('success', 'Account edited successfully');
    }


    public function user()
    {
        $users = User::join('accounts', 'users.acc_id', '=', 'accounts.id')
            ->select(
                'accounts.account_number',
                'accounts.fname',
                'accounts.lname',
                'users.id',
                'users.name',
                'users.email'
            )
            ->get();

        return view('admin.users', [
            'users' => $users
        ]);
    }
}
