@extends('layouts.admin_beranda')
@section('content')


<!-- include bootstrap, font awesome and rich text library CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="richtext/richtext.min.css" />
<!-- include jquer, bootstrap and rich text JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="richtext/jquery.richtext.js"></script>


<!-- resources/views/admin/faq/edit.blade.php -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <h1 class="text-center">Edit FAQ</h1>
            <form method="POST" action="{{ route('faq.update', $faq->id) }}">
                @csrf
                @method('PUT')
                <!-- hidden ID field of FAQ -->
                <input type="hidden" name="id" value="{{ $faq->id }}" required />
                <!-- question, auto-populate -->
                <div class="form-group">
                    <label>Enter Question</label>
                    <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required />
                </div>
                <!-- answer, auto-populate -->
                <div class="form-group">
                    <label>Enter Answer</label>
                    <textarea name="answer" id="answer" class="form-control" required>{{ $faq->answer }}</textarea>
                </div>
                <!-- submit button -->
                <input type="submit" name="submit" class="btn btn-info" value="Edit FAQ" />
            </form>

        </div>
    </div>
</div>

<!-- include CSS and JS if needed -->

@endsection
