   <h1 class="mb-4">Last entries</h1>
             @foreach($entries as $entry)
            <div class="card mb-4">
                <div class="card-header">{{$entry->title}}</div>
                <div class="card-body">          
                        <p>{{$entry->content}}</p>                   
                </div>
                <div class="card-footer">
                    Author: <a href="{{route('user.show',$entry->user_id)}}">{{$entry->user->name}}</a>
                     
                </div>
            </div>            
             @endforeach
             {{$entries->links()}}