@if (count($breadcrumbs))
  <ol class="breadcrumb">
      @foreach ($breadcrumbs as $breadcrumb)
          @if ($breadcrumb->url && !$loop->last)
            @if($breadcrumb->title == 'Home')
             <li class="breadcrumb-item">
                <a href="{{ route('home') }}"> <i
              class="fas fa-home"></i></a></li>
            @else
            <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @endif
          @else
            @if($breadcrumb->title == 'Home')
             <li class="breadcrumb-item active">
                 <i class="fas fa-home"></i>
             </li>
            @else
            <li class="breadcrumb-item active">
                {{ $breadcrumb->title }}
            </li>
            @endif
          @endif
      @endforeach
  </ol>
@endif