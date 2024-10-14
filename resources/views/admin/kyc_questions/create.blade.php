@extends('admin.layouts.admin')

@section('title', 'KYC Questions')

@section('css')

@endsection


@section('admin')
    <div class="container">
        <x-alert-info />
        <h2>KYC Questions</h2>
        <div class="mb-3">
            <a href="{{ route('admin.kyc_questions.index') }}" class="btn btn-primary">All Questions</a>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.kyc_questions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" name="question" id="question" class="form-control" >
                        <small id="questionHelp" class="form-text text-muted">A clear and concise question for KYC
                            verification.</small>
                        @error('question')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="response_type">Response Type</label>
                        <select name="response_type" id="response_type" class="form-control" >
                            <option value="text">Text</option>
                            <option value="select">Select</option>
                            <option value="file">File Upload</option>
                            <option value="multiple_files">Multiple Files Upload</option>
                        </select>
                        @error('response_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="options-group" style="display: none;">
                        <label for="options">Options (comma-separated)</label>
                        <input type="text" name="options" id="options" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="is_required">Required</label>
                        <select name="is_required" id="is_required" class="form-control" >
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('is_required')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" name="order" id="order" class="form-control" >
                        @error('order')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create Question</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('javascript')
    <script>
        document.getElementById('response_type').addEventListener('change', function() {
            var optionsGroup = document.getElementById('options-group');
            optionsGroup.style.display = this.value === 'select' ? 'block' : 'none';
        });
    </script>
@endsection
