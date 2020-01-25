@extends('layouts.app')

@section('content')
    
    <h1>昵称修改</h1>
    <hr/>
    <div class="panel panel-primary">
        <div class="panel-heading">当前昵称</div>
        <div class="panel-body">
            {{$player->NAME}}

        </div>
    </div>
    
    <!--
        Replace by use vue.js
    <form action="{{route('api.nickchange')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">新昵称</label>
            <input name="nick" type="text" class="form-control" placeholder="限制英文+数字组合">
        </div>
        <button type="submit" class="btn btn-primary pull-right">修改</button>

    </form>
    -->
<nick-change-form :csrf="{{json_encode(csrf_token())}}" :action="{{json_encode(route('api.nickchange'))}}"></nick-change-form>
@endsection
