@extends('layouts.homeapp')

@section('content')
    <form action='' method='post'>
    @csrf

    <label>Phone numbers (seperate with a comma [,])</label>
    <input type='text' name='numbers' />

    <label>Message</label>
    <textarea name='message'></textarea>

    <button type='submit'>Send!</button>
    </form>
@endsection