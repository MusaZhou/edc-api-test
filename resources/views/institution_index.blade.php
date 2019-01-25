@extends('layouts.main')

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>
@endsection

@section('main_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table id="institution_list" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('Institution Name') }}</th>
                        <th>{{ __('User Name') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __('Address') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($institution_list as $institution)
                        <tr>
                            <td>{{ $institution->id }}</td>
                            <td>{{ $institution->name }}</td>
                            <td>{{ $institution->user->name }}</td>
                            <td>{{ $institution->phone }}</td>
                            <td>{{ $institution->address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{ __('Institution Info') }}
                        </button>
                    </h5>
                    </div>
                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form id="institution-info-form">
                            <input type="hidden" name="institution_id" id="institution_id">
                            <input type="hidden" name="user_id" id="user_id">
                            <div class="form-group">
                                <label for="institution_name">{{ __('Institution Name') }}</label>
                                <input type="text" class="form-control" name="institution_name" id="institution_name" placeholder="{{ __('Institution Name') }}">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-institution_name"></strong>
                                </span>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">{{ __('User Email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('Email') }}" required>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-email"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="username">{{ __('User Name')}}</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="{{ __('User Name') }}" required>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-username"></strong>
                                    </span>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="phone">{{ __('Phone')}}</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ __('Phone Name') }}" required>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-phone"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="{{ __('Address') }}">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-address"></strong>
                                </span>
                            </div>
                            <button type="button" id="edit-institution-info-btn" class="btn btn-primary" onclick="beginEditInstitutionInfo()">{{ __('Edit') }}</button>
                            <button type="button" id="update-institution-info-btn" class="btn btn-primary" onclick="updateInstitutionInfo()" style="display:none">{{ __('Update') }}</button>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        {{ __('API List') }}
                        </button>
                    </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                        </button>
                    </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(function(){
            var institutionListTable = $('#institution_list').DataTable({
                select: { style: 'single'},
                columnDefs: [
                    {
                        'targets': [0],
                        'visible': false,
                        'searchable': false
                    }
                ]
            });

            institutionListTable.on('select', function(e, dt, type, indexes){
                var rowData = institutionListTable.row(indexes[0]).data()
                console.log(rowData);
                var institution_id = rowData[0];
                axios.post('{{ route("get_institution_data") }}', {
                    institution_id: institution_id
                }).then(function(response){
                    console.log(response);
                    var address = response.data.address;
                    var phone = response.data.phone;
                    var institution_name = response.data.name;
                    var user_email = response.data.user.email;
                    var user_name = response.data.user.name;
                    var user_id = response.data.user.id;

                    $('#institution_id').val(institution_id);
                    $('#institution_name').val(institution_name);
                    $('#address').val(address);
                    $('#phone').val(phone);
                    $('#email').val(user_email);
                    $('#username').val(user_name);
                    $('#user_id').val(user_id);

                    forbidEditInstitutionInfo();
                }).catch(function(error){
                    console.log(error);
                });
            });


        });

        function beginEditInstitutionInfo(){
            enableElements($('#institution-info-form input'));
            $('#edit-institution-info-btn').hide();
            $('#update-institution-info-btn').show();
        }

        function forbidEditInstitutionInfo(){
            disableElements($('#institution-info-form input'));
            $('#edit-institution-info-btn').show();
            $('#update-institution-info-btn').hide();
        }

        function updateInstitutionInfo(){
            axios({
                    method: 'post',
                    url: '{{ route("update_institution_data") }}',
                    data: new FormData($('#institution-info-form')[0]),
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
                .then(function (response) {
                    forbidEditInstitutionInfo();
                })
                .catch(function (error) {
                    console.log(error.response.data.errors);
                    var errors = error.response.data.errors;
                    for (key in errors){
                        var error_element_id = '#error-'+key;
                        $(error_element_id).text(errors[key]);
                        $(error_element_id).parent('span').siblings('input').addClass('is-invalid');
                    }
                });
        }
    </script>
@endsection
