@extends('painel.template.template')

@section('content')
<div class="content">
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
    <script>

        var categorys =[];

        @foreach($categorys as $category)
            categorys.push({
                name : "{{$category->name}}",
                y : parseInt("{{$category->total}}")
            });
        @endforeach

    </script>
</div>
@endsection
