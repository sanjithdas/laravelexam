@include('admin.navigation')
    <x-admin-layout>
        <div class="card">
            @include('admin.header')
            <div class="card-header">
                {{ trans('global.show') }} {{ trans('titles.category.title') }}
            </div>

            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('titles.category.fields.id') }}
                                </th>
                                <td>
                                    {{ $category->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('titles.category.fields.name') }}
                                </th>
                                <td>
                                    {{ $category->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('titles.batch.title_singular') }}
                                </th>
                                <td>
                                    {{ $category->batch->batch_label }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </x-admin-layout>
