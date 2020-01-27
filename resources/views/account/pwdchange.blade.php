@extends('layouts.app')

@section('content')
    
    <h1>密码修改 <small>{{$player->NAME}} - {{$player->UID}}</small></h1>
    <hr/>

    <pwd-change-form :csrf="{{json_encode(csrf_token())}}" :action="{{json_encode(route('api.pwdchange'))}}"></pwd-change-form>
@endsection
