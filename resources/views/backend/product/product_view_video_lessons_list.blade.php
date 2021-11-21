@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product VideoLesson List</h4>

                            <a href="{{ route('product.edit.media',$productId) }}" class="btn btn-info" title="Add Video Lesson"><i class="fa fa-plus"></i> </a>

                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Video Lesson Name</th>
                                    <th>active</th>
                                    <th>free</th>
                                    <th>order</th>
                                    <th>weight</th>
                                    <th>score</th>
                                    <th>minutes</th>
                                    <th>views</th>
                                    <th>downloads</th>
                                    <th width="30%">Media</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videoLessons as $key => $videoLesson)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $videoLesson->lesson_name }}</td>
                                        <td>{{ $videoLesson->active?1:0 }}</td>
                                        <td>{{ $videoLesson->free?1:0 }}</td>
                                        <td>{{ $videoLesson->order }}</td>
                                        <td>{{ $videoLesson->weight }}</td>
                                        <td>{{ $videoLesson->score }}</td>
                                        <td>{{ $videoLesson->minutes }}</td>
                                        <td>{{ $videoLesson->views }}</td>
                                        <td>{{ $videoLesson->downloads }}</td>
                                        <td width="30%">
                                        <video width="30%" src="{{$videoLesson->getFirstMediaUrl('videoList')}}"
                                               controls>
                                        </video>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('product.multiMedia.delete', $videoLesson->id) }}"
                                                   class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i
                                                        class="fa fa-trash"></i> </a>
                                            </h5>
                                            <p class="card-text">
                                            </p>

                                        </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div> <!-- // end row  -->

        </section>

    </div>

    <style>
        video {
            width: 100%;
            height: auto;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


            $('select[name="subcategory_id"]').on('change', function () {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{  url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        });
    </script>


    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>

        $(document).ready(function () {
            $('#multiImg').on('change', function () { //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function (index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function (file) { //trigger function on successful read
                                return function (e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>




@endsection
