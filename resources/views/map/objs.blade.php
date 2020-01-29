@extends('layouts.app')

@section('content')
<h1>地图导出 <small>总计: {{$player->objs->count()}}</small></h1>
    <hr/>
    <object-export-form :csrf="{{json_encode(csrf_token())}}" :action="{{json_encode(route('api.objects.export'))}}"></object-export-form>
@endsection