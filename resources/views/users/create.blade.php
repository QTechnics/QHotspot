@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Kullanıcı Ekleme
                <small>Test</small>
            </h1>
            <ol class="breadcrumb">
                <li>Deneme</li>
                <li>Deneme</li>
                <li class="active">Deneme</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="Enter email" autocomplete="off"
                                           style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           placeholder="Password" autocomplete="off"
                                           style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                </div>
                                <div class="form-group">
                                    <label for="attributes">Attributes</label>
                                    <select multiple="multiple" size="10" name="attributes[]" id="attributes">
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@section("css")
    <link rel="stylesheet" href="/css/bootstrap-duallistbox.min.css">
@endsection
@section('scripts')
    <script src="/js/jquery.bootstrap-duallistbox.min.js"></script>
    <script type="text/javascript">
        let attributeSelect = $('select[name="attributes[]"]');
        let attributesBox = attributeSelect.bootstrapDualListbox({
            preserveSelectionOnMove: 'moved',
            nonSelectedListLabel: 'Non-selected',
            selectedListLabel: 'Selected',
            infoText: "Showing all {0}",
            infoTextEmpty: "<span class=\"label label-warning\">Filtered</span> {0} from {1}",
            filterTextClear: "Show All",
            filterPlaceHolder: "Filter",
            moveSelectedLabel: "Move selected",
            moveAllLabel: "Move all",
            removeSelectedLabel: "Remove selected",
            removeAllLabel: "Remove all"
        });

        function getAttributes() {
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ action("AjaxController@getAttributes") }}',
                data: "",
                success: function (response) {
                    attributeSelect.empty();
                    $.each(response, function(i, obj){
                        attributeSelect.append($('<option>').text(obj).attr('value', i));
                    });
                    attributeSelect.bootstrapDualListbox('refresh', true);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            })
        };

        $(document).ready(function () {
            getAttributes();
        });
    </script>
@endsection