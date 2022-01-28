@include('admin.navigation')
<x-admin-layout>

    <div class="card">
        @include('admin.header')
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('titles.user.title_singular') }}
        </div>



        <div class="card-body">
            <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('titles.user.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('titles.user.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('titles.user.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('titles.user.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="password">{{ trans('titles.user.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('titles.user.fields.password_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="roles">{{ trans('titles.user.fields.roles') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 1">Select Role</span>
                        {{-- <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span> --}}
                    </div>

                    {{ $roleSelected ?? ""  }}    
                       <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles"  required>
                        @foreach($roles as $id => $roles)
                            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('roles'))
                        <div class="invalid-feedback">
                            {{ $errors->first('roles') }}
                        </div>
                    @endif

                   
                    <span class="help-block">{{ trans('titles.user.fields.roles_helper') }}</span>
                </div>
                {{ $batchJoined }}
                <div class="form-group" id="batch_select">
                    <label class="required" for="batch_id">{{ trans('titles.batch.title_select') }}</label>
                    <select class="form-control select2 {{ $errors->has('batch') ? 'is-invalid' : '' }}" name="batch_id" id="batch_id" required>
                        @foreach($batches as $id => $batch)
                            <option value="{{ $batch->id }}" {{ $batchJoined == $batch->id ? 'selected' : '' }}>{{ $batch->batch_label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('batch_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('batch_id') }}
                        </div>
                    @endif
                
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
      
       if ({{  $roleSelected && $roleSelected!=3 }})
         jQuery("#batch_select").hide();
        jQuery("#roles").change(function (){
        var type = this.value;
        console.log(type);
        if (type==3) jQuery("#batch_select").show();
        else jQuery("#batch_select").hide();
       }) 
           
       
    </script>

</x-admin-layout>
