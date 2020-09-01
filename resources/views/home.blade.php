@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p>My entries</p>
            <ul>
                @foreach ($entries as $entry)
                    <li>
                        <a href="{{route('entries.show',$entry->slug.'-'.$entry->id)}}">{{$entry->title}}</a>
                    </li>
                @endforeach
            </ul>
            {{$entries->links()}}
        </div>
    </div>
    </div>
</div>
@endsection
