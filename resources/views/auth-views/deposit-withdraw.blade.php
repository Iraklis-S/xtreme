@extends('layout.logged')


@section('css')
<link rel="stylesheet" href="{{asset('project/css/deposit-wd.css')}}">
@endsection
@section('body-content')


<h1>Deposit or Withdraw</h1>
@if(session('success'))
    <div class="success-message text-center fw-bold alert alert-success shadow">
        
        {{ session('success') }}
    </div>
@endif

@if(session('failure'))
    <div class="failure-message text-center fw-bold alert alert-danger shadow">
        {{ session('failure') }}
    </div>
@endif
<div class="form-container">

    <form action="/save-request-to-db" method="POST">
        @csrf

        <div class="c45" >
            <label for="amount">Amount:</label>
            <input type="number" name="amount" placeholder="1000.00" step="0.01" required>

            <label for="currency">Currency:</label>
            <select name="currency" required>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select>

        </div>


        <div class="c45" >
            <label for="method">Method:</label>
            <select name="method" required>
                <option value="">Method</option>
                <option value="MasterCard">MasterCard</option>
                <option value="BankAccount">Bank Account</option>
            </select>
            <label for="accountNumber">Account or Card Number:</label>
            <input type="text" name="accountNumber" id="accountNumber"  placeholder="ACCOUNT or CARD Number" required>
         </div>


            <div class="c45" >
            <label for="bankName">Bank Name:</label>
            <input type="text" name="bankName" id="bankName" placeholder="Bank Name">

            <label for="bankAddress">Bank Address:</label>
            <input type="text" name="bankAddress" id="bankAddress" placeholder="Bank Address">
            </div>


            <div class="c45" >
                <label for="transaction-type">Transaction Type:</label>
                <div class="transaction-type-container">
                    <input type="radio" name="transactionType" value="deposit" id="deposit" required>
                    <label for="deposit">Deposit</label>
                    <input type="radio" name="transactionType" value="withdraw" id="withdrawal" required>
                    <label for="withdrawal">Withdrawal</label>
                </div>

            <label for="description">Description:</label>
            <textarea name="description" rows="3" placeholder="Additional details"></textarea>
        </div>

        <div style="width: 100%; text-align: center;">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>


<div class="requests-container">
    <h1 class="requests-header">CURRENT REQUESTS</h1>
    @foreach ($requests as $request)
        <div class="request">
            <div class="request-item">
                <span class="request-label">Method:</span> {{$request->method}}
            </div>
            <div class="request-item">
                <span class="request-label">Transaction Type:</span> {{$request->transaction_type}}
            </div>
            <div class="request-item">
                <span class="request-label">Amount:</span> {{$request->amount}}
            </div>
            <div class="request-item">
                <span class="request-label">Currency:</span> {{$request->currency}}
            </div>
        </div>
    @endforeach


</div>

 @endsection