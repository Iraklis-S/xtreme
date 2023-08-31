@extends('layout.logged')

@section('css')
<link rel="stylesheet" href="{{ asset('project/css/dashboard.css') }}">

@endsection

@section('body-content')

<h1 class="text-center">DASHBOARD</h1>
<h2>Account Information</h2>
<div class="parts2">
    
    <div class="content">
      <div>  <span>Account ID: </span> <span>{{ auth()->user()->id }}<span></div> 
       <div> <span>Name:</span><span> {{ auth()->user()->name }} {{ auth()->user()->lastname }}</span></div> 
       <div>  <span>Current Balance: </span><span>{{ auth()->user()->userAccount->balance }}</span></div> 
       <div>  <span>Account Currency: </span><span>{{ auth()->user()->userAccount->currency }}</span></div> 
       <div>  <span>Account Type:</span><span> {{ auth()->user()->userAccount->accountType->type }}</span></div> 
    </div>
</div>

<div class="big-dashboard">

    <div class="chart-contain">
        <canvas id="balanceChart"></canvas>
    </div>
    <div class="chart-contain">
        <canvas id="myChart"></canvas>
    </div>
    

</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ asset('project/js/chart-code.js') }}"></script>
@endsection
