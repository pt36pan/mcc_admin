{{--继承基本模板 baseLayout--}}
@extends('admin.baseLayout')

{{--页面的css--}}
@section('resource')

@stop

{{--页面主体内容--}}
@section('content')
    <div>
        purchase
    </div>
@stop

{{--页面的js--}}
@section('script')
    <script type="text/javascript" src="{{URL::to('js/admin/purchase.js')}}"></script>
@stop