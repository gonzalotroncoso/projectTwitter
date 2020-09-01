@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
               @if($entries->IsEmpty())
                <p>Aún no has publicado nada</p>
                @else
            <p>My entries</p>            
            <ul>
                @foreach ($entries as $entry)
                    <li>
                        <a href="{{route('entries.show',$entry->slug.'-'.$entry->id)}}">{{$entry->title}}</a>
                    </li>
                @endforeach
            </ul>
            {{$entries->links()}}
            @endif
        </div>
    </div>
    </div>
</div>
@endsection
