@extends("frontend.layout.main")

@section('main-container')
      <!----------------------
     Gallery section start"
       ----------------------->
       <div class="gallery-main">
        <h2>Hostels Results: </h2>
       <div class="filter-buttons">
        {{-- <button class="filter-button active" data-filter="all">Search => </button>
        <button class="filter-button" data-filter="category1">Gilgit</button>
        <button class="filter-button" data-filter="category2"></button>
        <button class="filter-button" data-filter="category3">Category 3</button> --}}
      </div>


      <div class="gallery">

        <div class="grid-container " >

            @foreach ($results as $hostel)
                        <div class="grid-item" data-category="category1">
                            <img src="/{{$hostel->hostel_image }}" style="width:80px;" alt="">                          <div class="overlay">
                                <div class="overlay">
                                    <a href="{{ route('hostel-detail', ['id'=>$hostel->id]) }}"> <div class="overlay-content">{{ $hostel->name }}</div></a>
                                   </div>
                          </div>
                        </div>
            @endforeach



            </div>

      </div>
    </div>

 @endsection
