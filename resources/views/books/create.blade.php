@extends('layouts.master')
@section('title')
    New Books
@endsection

@section('content')
    <div class="container" style="margin:0 auto">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin:0 auto">
                <div class="pull-left">
                    <button class="add_field_button btn btn-success">Create More</button>
                </div>
                <div class="pull-right">
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col md-offset-1" style="margin:0 auto">
                <form action="{{ route('books.store') }}" method="post" style="margin-top:20px">
                    @csrf

                    <div class="row col-md-10 col md-offset-1" style="margin:0 auto">
                        <div class="col-md-6 form-group">
                            <label for="name" class="control-label">Book Name</label>
                            <input type="text" name="name[]" id="name" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="author" class="control-label">Author Name</label>
                            <input type="text" name="author[]" id="author" class="form-control" required>
                        </div>
                    </div>
                    <div class="input_fields_wrap">
                    </div>
                    <div class="form-group col-md-10 " style="margin:0 auto"><input type="submit" value="submit" class="btn btn-success form-control"></div>

                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        var max_fields = 20; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row col-md-10 col md-offset-1" style="margin:0 auto">' +
                        '<div class="col-md-5 form-group">'+
                            '<label for="name" class="control-label">Book Name</label>'+
                            '<input type="text" name="name[]" id="name" class="form-control">'+
                        '</div>'+
                        '<div class="col-md-5 form-group">'+
                            '<label for="author" class="control-label">Author Name</label>'+
                            '<input type="text" name="author[]" id="author" class="form-control">'+
                        '</div>'+
                        '<div class="col-md-2"><a href="#" class="remove_field glyphicon glyphicon-remove marginTop" aria-hidden="true"><i class="fas fa-times"></i></a></div>' +
                        '</div>'); //add input box
            }
        });
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault();
            $(this).parent("div").parent("div").remove();
            x--;
            $(this).parent("div").parent("div").remove();
            x--;
        })
    });
</script>
@endsection
