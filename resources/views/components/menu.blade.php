<div class="row">
    <div class="col-sm-12 offset-md-1 py-4">
        <h4 class="text-white">Категории</h4>
        <ul class="list-unstyled">
            @foreach($category as $item)
                <li><a href="{{ route('news',$item['id']) }}" class="text-white">{{$item['title']}}</a></li>
            @endforeach
        </ul>
    </div>
</div>


