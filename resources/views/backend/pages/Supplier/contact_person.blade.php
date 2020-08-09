
    @php
        $i=0;
    @endphp 
    <ul class="list-group list-group-flush">
    @foreach ($supplier->contactPerson as $value) 
        @php
            $i++;
            @endphp
        <li class="list-group-item">{!!  $i.'> '.$value->name !!}({!! $value->designation !!}),{!! $value->email !!}  {!! $value->mobile !!}</li>
        
        @endforeach

</ul>
    