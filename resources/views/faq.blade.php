@extends('layouts.app')
@section('content')

<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    /* Custom styles for the FAQ page */
    .panel-title a {
        font-weight: normal; /* Default font weight for the question text */
        color: #313131; /* Default color for the question text */
        transition: color 0.3s; /* Smooth color transition on hover */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .panel-title a:hover,
    .panel-title a.collapsed {
        font-weight: bold; /* Bold font weight when question is expanded */
    }

    .question-text {
        flex-grow: 1;
    }

    .arrow-icon {
        margin-left: 10px;
        transition: transform 0.3s; /* Smooth rotation transition */
    }

    .arrow-icon.rotated {
        transform: rotate(180deg); /* Rotate arrow when question is expanded */
    }

    .panel-group {
        margin-top: 20px;
    }

    .panel-title a.collapsed {
        color: #313131;
    }
    .panel-title a:not(.collapsed) {
        color: #4BA30D;
    }
    .container.text-center p a {
        color: #4BA30D;
        font-weight: bold;
        text-decoration: none;
    }
</style>

<!-- show all FAQs in a panel -->
<h1 class="text-center">Frequently Asked Questions</h1>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Search FAQ...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="searchButton">Search</button>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-group" id="accordion">
                @foreach ($faqs as $faq)
                <div class="panel panel-default">
                    <!-- button to show the question -->
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#faq-{{ $faq['id'] }}" aria-expanded="false" aria-controls="faq-{{ $faq['id'] }}" class="collapsed">
                                <span class="question-text">{{ $faq['question'] }}</span>
                                <i class="fas fa-chevron-down arrow-icon"></i>
                            </a>
                        </h4>
                    </div>
                    <!-- accordion for answer -->
                    <div id="faq-{{ $faq['id'] }}" class="panel-collapse collapse" aria-expanded="false" role="tabpanel">
                        <div class="panel-body">
                            {{ $faq['answer'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    // Add JavaScript to handle color change and arrow rotation on question expand
    $(document).ready(function() {
        $('.panel-title a').click(function() {
            $(this).find('.question-text').toggleClass('question-expanded');
            $(this).find('.arrow-icon').toggleClass('rotated');
        });
    });

    // Add JavaScript for search functionality
    $(document).ready(function() {
        $('#searchButton').click(function() {
            var searchText = $('#searchInput').val().toLowerCase();
            $('.panel-title a').each(function() {
                var questionText = $(this).find('.question-text').text().toLowerCase();
                if (questionText.includes(searchText)) {
                    $(this).parents('.panel').show();
                } else {
                    $(this).parents('.panel').hide();
                }
            });
        });
    });
</script>
<div class="container text-center" style="margin-top: 30px;">
    <p>Jika ada pertanyaan baru silahkan <a href="https://wa.me/6282229042903" target="_blank">klik disini</a></p>
</div>

@endsection


