
@if ($errors->any())
        
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <ul>
                    <li class="list-item">{{ $error }}</li>
                </ul>
            </div>
            @endforeach
        
@endif