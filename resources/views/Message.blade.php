@extends('layout.app')
@section('head')
    <style>
        .nice-select{
            width: 100%;
            margin-bottom:20px;
            background: #F4F4F4;
        }
        .list{
            width: 100%;
            margin-top:1px;
        }
    </style>
@endsection
@section('content')
<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="destination_info">
                    <div class="alert alert-success" role="alert">
                        <strong>
                            @if(Session::has("Etat"))
                                {{Session::get("Etat")}}
                            @endif
                        </strong>
                        @if(Session::has("Message"))
                            {{Session::get("Message")}}
                        @endif
                         <a href="#" class="alert-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
