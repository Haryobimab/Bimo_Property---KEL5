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

<!-- layout for form to add FAQ -->
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <h1 class="text-center">Add FAQ</h1>
            <!-- form to add FAQ -->
            <form method="POST" action="{{ route('faq.store') }}">
                @csrf
                <!-- question -->
                <div class="form-group">
                    <label>Enter Question</label>
                    <input type="text" name="question" class="form-control" required />
                </div>
                <!-- answer -->
                <div class="form-group">
                    <label>Enter Answer</label>
                    <textarea name="answer" id="answer" class="form-control" required></textarea>
                </div>
                <!-- submit button -->
                <input type="submit" name="submit" class="btn btn-info" value="Add FAQ" />
            </form>
        </div>
    </div>
    <!-- show all FAQs added -->
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <table class="table table-bordered">
                <!-- table heading -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <!-- table body -->
                <tbody>
                    @foreach ($faqs as $faq)
                        <tr>
                            <td>{{ $faq->id }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td>
                                <!-- edit button -->
                                <form method="POST" action="{{ route('faq.edit', $faq->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" name="submit" class="btn btn-warning" value="Edit FAQ" />
                                </form>
                                <!-- delete button -->
                                <form method="POST" action="{{ route('faq.delete', $faq->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" name="submit" class="btn btn-danger" value="Delete FAQ" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
