@include('admin.navigation')
<x-admin-layout>

  <div class="card">
    @include('admin.header')
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('titles.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('titles.question.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('titles.question.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="question_text">{{ trans('titles.question.fields.question_text') }}</label>
                <input type="text" class="form-control {{ $errors->has('question_text') ? 'is-invalid' : '' }}" name="question_text" id="question_text" required>{{ old('question_text') }}</textarea>
                <trix-editor input="question_text"></trix-editor>
                @if($errors->has('question_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('titles.question.fields.question_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="question_type">Question Type </label>
                    <select class="form-control select2"  name="question_type" id="question_type" >
                        <option value="r">"r" for Radio (Single selection)</option>
                        <option value="a">"a" for Multiline Options (Textarea)</option>
                        <option value="t">"t" for Single line (Textfield)</option>
                        {{-- <option value="rt">"rt" for Radio and Single line (Textfield)</option>
                        <option value="c">"c" for Checkbox (Textarea)</option>  --}}
                        <option value="c">"c" for Checkbox (Textarea)</option> 
                        <option value="s">"s" for Select (Select Box)</option> 
                    </select>
                
            </div>
            <div class="form-group">
                <label  for="image">{{ trans('titles.question.fields.image') }}</label>
                <input type="file" class="form-control" name="description" id="description">
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

</x-admin-layout>
