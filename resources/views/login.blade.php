@extends('layouts.app')

@section('content')
    <div class="login-form">

        <form action="{{route('login')}}" method="post">
            @csrf
            <h2 class="text-center">登录</h2>       
            <div class="form-group">
                <input name="name" type="text" class="form-control" placeholder="游戏昵称" required="required">
            </div>
            <div class="form-group">
                <input name="pwd" type="password" class="form-control" placeholder="密码" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">登录</button>
            </div>
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox"> 记住我</label>
                <a href="#" class="pull-right">忘记密码?</a>
            </div>        
        </form>
    </div>
@endsection
