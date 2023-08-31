
@extends('all-views.layout-view')

@section('content')


<form action="/create-post" method="post">

    @csrf
<label for="title">TITLE</label><br>
    <input type="text" name="title" id="title" placeholder="TITLE"><br>
    <label for="field">TEXT HERE</label><br>
    
    <textarea name="field" id="field" cols="80" rows="5"></textarea>

    <br>

    <select name="options" id="options">
        <option value="1">personal</option>
        <option value="2">work</option>
        <option value="3">hobby</option>
    </select>
    <br>
    <input type="submit" value="SEND">
    
    </form>

    @endsection