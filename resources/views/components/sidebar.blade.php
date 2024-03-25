<div class="container py-4 ms-2 vh-100">
  <h2>カテゴリ一覧</h2>
    @foreach($categories as $category)
      <p>
      <label class=""><a href="{{ route('restaurants.index', ['category' => $category->id]) }}">{{ $category->category_name }}</a></label>
      </p>
  @endforeach
</div>