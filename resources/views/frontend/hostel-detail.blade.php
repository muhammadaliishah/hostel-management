@extends("frontend.layout.main")

@section('main-container')
  <!-- <-----------------------
  Blog Page Section Start
  ------------------------->
  <header class="blog-header">
    <h2>Hostel Detail </h2>
    <div class="blog-nav">
      <ul>
        <li><a href="/">Home =></a></li>
        <li><a >Blogs => </a></li>
        <li><a >{{ $hostel->name }}</a></li>
      </ul>
    </div>
  </header>
  <main class="blog-content">
    <article>
      <h3>{{$hostel->name}}</h3>
      <p>{{ $hostel->author}}</p>
      {{ $hostel->image }}
      <img src="/{{ $hostel->hostel_image}}" alt="Blog Post Image">
      <p>{{ $hostel->description}}</p>
    </article>


  </main>

    @endsection
