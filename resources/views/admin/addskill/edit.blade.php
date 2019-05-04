@extends('layouts.backend.app')
@section('title','Tag')
@push('css')

@endpush
@section('content')
	<div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Tag
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('admin.addskill.update',$applications->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    Name of Skill: <input type="text" name="name_of_skill" class="form-control" id="name_of_skill" value="{{ $applications->name_of_skill }}">
                                </div>
                            </div>
                            <table  class="table table-hover table-bordered small-text" id="tb" width="100%">
                                <tr class="tr-header">
                                    <th width="10%" class="text-center">Skill_Name</th>
                                    <th width="10%" class="text-center">Skill_Name</th>
                                    <th width="15%" class="text-center">Skill_Status</th>
                                    <th width="15%" class="text-center">Skill_Duration</th>
                                    <th width="15%" class="text-center">Good_Skill</th>
                                    <th width="15%" class="text-center">Bad_Skill</th>
                                    <th width="20%" class="text-center">Skill_Attach</th>
                                    <th width="5%" class="text-center"><a href="javascript:void(0);" class="btn btn-primary btn-sm" id="addMore" title="Add More Person"><b>+</b></a></th>
                                </tr>
                                @foreach($addskills as $addskill)
                                <tr>
                                    <td>
                                        <input type='text' name="child[]" class='' value="{{ $addskill->id}}" />
                                    </td>
                                    <td>
                                        <input type="text" name="skill_name[]" id="skill_name" class="form-control" value="{{ $addskill->skill_name }}">
                                    </td>
                                    <td>
                                        <input type="text" name="skill_status[]" id="skill_status" class="form-control" value="{{ $addskill->skill_status }}">
                                    </td>
                                    <td>
                                        <input type="number" name="skill_duration[]" id="skill_duration" class="form-control" value="{{ $addskill->skill_duration }}">
                                    </td>
                                    <td>
                                        <input type="text" name="good_skill[]" id="good_skill" class="form-control" value="{{ $addskill->good_skill }}">
                                    </td>
                                    <td>
                                        <input type="text" name="bad_skill[]" id="bad_skill" class="form-control" value="{{ $addskill->bad_skill }}">
                                    </td>
                                    <td>
                                        <input type="file" name="skill_attach[]" id="skill_attach" class="form-control">
                                    </td>
                                    <td align="center">
                                        <a href='javascript:void(0);'  class='btn btn-danger btn-sm remove'><b>x</b></a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <a href="{{route('admin.addskill.index')}}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(function(){
            var row = 2;
            $('#addMore').on('click', function() {
                var data = $("#tb tr:eq(1)").clone(true);
                data.find('input#registration_no1').addClass('registration_no'+row);
                data.find("#registration_no1").removeClass('registration_no1');
                data.find('input#registration_date1').addClass('registration_date'+row);
                data.find("#registration_date1").removeClass('registration_date1');
                data.find('input#registration_copy1').addClass('registration_copy'+row);
                data.find("#registration_copy1").removeClass('registration_copy1');
                data.appendTo("#tb");
                data.find("input").val('');
                row++;
            });
            $(document).on('click', '.remove', function() {
                var trIndex = $(this).closest("tr").index();
                if(trIndex>1) {
                    $(this).closest("tr").remove();
                } else {
                    alert("Sorry!! Can't remove first row!");
                }
            });
        });
    </script>
@endpush
