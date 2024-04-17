
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="p-2 border-2 border-slate-200 rounded-xl flex justify-between items-center">
      <p>
        Ayo berikan ulasanmu sekarang juga, Setiap pendapat Anda memiliki kekuatan untuk membantu calon pembeli dalam membuat keputusan yang tepat.
      </p>
        <a href="{{ route('ulasan.create') }}" class="text-white p-2  bg-[#4ba30d] rounded-xl hover:bg-[#43920b]">Berikan ulasan</a>
    </div>
  <div class="mb-4">
    @foreach ($ulasans as $ulasan)
    <div class="mt-4 bg-slate-200/50 p-2 rounded-xl">
      <b>{!! $ulasan->title !!} </b>
      <p>{!! $ulasan->body !!}</p>
    </div>
    @endforeach
    </div>
    @endsection
</body>
</html>
