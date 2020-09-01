@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$entry->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$entry->content}}


                </div>

            </div>
            @if($entry->user_id === auth()->id())
            <a href="{{route('entries.edit',$entry->slug.'-'.$entry->id)}}" class="btn btn-primary btn-block mt-4">Edit entry</a>
            @endif
        </div>
    </div>
</div>
@endsection
