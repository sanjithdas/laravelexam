
@include('admin.navigation')
<x-admin-layout>
    <div class="card">
        @include('admin.header')
        <div class="card">
            <div class="card-header">
                {{ trans('global.edit') }} {{ trans('titles.batch.title_singular') }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.batches.update", [$batch->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('titles.batch.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('batch_label') ? 'is-invalid' : '' }}" type="text" name="batch_label" id="batch_label" value="{{ old('batch_label', $batch->batch_label) }}"  >
                        @if($errors->has('batch_label'))
                            <div class="invalid-feedback">
                                {{ $errors->first('batch_label') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('titles.batch.fields.name_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <select name="display_status">
                            <option value="1"> Visible  </option>
                            <option value="0"> Invisible </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
