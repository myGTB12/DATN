@extends('layouts/adminNavbarLayout')

@section('title', __('messages.title'))

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Add new voucher :</span>
</h4>

<div class="row">
    <form style="width: 100%;" enctype="multipart/form-data" class="mb-3" action="{{route('voucher.create')}}" method="POST">
        @csrf
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Voucher title</label>
                    <input type="text" name="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Code</label>
                    <input type="text" name="code" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Amount</label>
                    <input type="text" name="amount" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Vocuher banner</label>
                    <input class="form-control" name="img" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Start time</label>
                    <div class="col-md-3">
                        <input class="form-control" type="datetime-local" name="start_time">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Expire time</label>
                    <div class="col-md-3">
                        <input class="form-control" type="datetime-local" name="expire_time">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="button" id="cancelEditButton" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection