@include('admin.navigation')
    <x-admin-layout>
        <div class="card">
            @include('admin.header')
            <div class="card-header">
                {{ trans('global.show') }} {{ trans('titles.batch.title') }}
            </div>

            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.batches.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('titles.batch.fields.id') }}
                                </th>
                                <td>
                                    {{ $batch->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('titles.batch.fields.name') }}
                                </th>
                                <td>
                                    {{ $batch->batch_label }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.batches.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </x-admin-layout>
