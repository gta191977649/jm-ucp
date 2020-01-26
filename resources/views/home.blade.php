@extends('layouts.app')

@section('content')
    
    <h1>{{$user->NAME}} <small>ID: {{$user->UID}}</small></h1>
    <hr/>
    
    <div class="row text-center ">
        <div class="col-xs-6 col-sm-3 placeholder">
            <i class="fas fa-clock fa-5x"></i>
            <h4>游玩时长</h4>
            <span class="text-muted">{{round($user->OnlineTime/60)}} 小时</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <i class="fas fa-car fa-5x"></i>
            <h4>载具数</h4>
            <span class="text-muted">{{$user->vehicles->count()}}</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <i class="fas fa-map fa-5x"></i>
            <h4>OBJ</h4>
        <span class="text-muted">{{$user->objs->count()}}</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <i class="fas fa-tshirt fa-5x"></i>
            <h4>绑定OBJ(装扮)</h4>
            <span class="text-muted">{{$user->attachObjects->count()}}</span>
        </div>
      </div>
      <h2>详细信息</h2>
      <hr/>
      <table class="table table-hover">
        <thead>
            <tr>
              <th>属性</th>
              <th>详细</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td style="color:red;"><strong>账户ID*</strong></td>
                <td style="color:red;"><strong>{{$user->UID}}</strong></td>
            </tr>
            <tr>
                <td>昵称</td>
                <td>{{$user->NAME}}</td>
            </tr>
            <tr>
                <td>金钱</td>
                <td>{{$user->MONEY}}</td>
            </tr>
            <tr>
                <td>分数</td>
                <td>{{$user->SCORE}}</td>
            </tr>
           
            <tr>
                <td>IP</td>
                <td>{{$user->IP}}</td>
            </tr>
           
            <tr>
                <td>坐标(最后在线)</td>
                <td>{{$user->X}},{{$user->Y}},{{$user->Z}}</td>
            </tr>
            <tr>
                <td>室内空间ID(最后在线)</td>
                <td>{{$user->INT}}</td>
            </tr>
            <tr>
                <td>注册时间</td>
                <td>{{$user->RegTime}}</td>
            </tr>
            <tr>
                <td>最后登录</td>
                <td>{{$user->LastLogin}}</td>
            </tr>
            <tr>
                <td>游玩时间</td>
                <td>{{round($user->OnlineTime/60)}} 小时</td>
            </tr>
           
          </tbody>
      </table>
      <h2>活动记录</h2>
      <hr/>
      @if($user->logs->count() > 1)
      <table class="table table-hover">
        <thead>
            <tr>
                <th>上线时间</th>
                <th>下线时间</th>
                <th>IP</th>
            </tr>
        </thead>
        @foreach ($user->logs as $log)
            <tr>
                <td>{{$log->LoginTime}}</td>
                <td>{{$log->DisTime}}</td>
                <td>{{$log->IP}}</td>
            </tr>
        @endforeach
    </table>
      @else
        <p class="text-center">暂无数据</p>
      @endif
      


@endsection
