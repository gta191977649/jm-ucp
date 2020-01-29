@extends('layouts.app')

@section('content')
<h1>地图导出 <small>{{$player->NAME}}</small></h1>
    <hr/>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>提示: </strong>你共创建了{{$player->objs->count()}}个OBJ。
    </div>
    <object-export-form :csrf="{{json_encode(csrf_token())}}" :action="{{json_encode(route('api.objects.export'))}}"></object-export-form>
@endsection