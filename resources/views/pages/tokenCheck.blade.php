@extends('layouts.app')
@section('title', 'Token Check')
@section('content')
    <div class="col-lg-12 text-center">
        <h1>Excel To Sticker</h1>
    </div>
    <div class="row justify-content-center align-content-center" style="height: 80vh">
        <div class="col-lg-6">
            <form action="{{ route('tokenCheckPost') }}" method="post" enctype='multipart/form-data'>
                {{ csrf_field() }}<br>
                {{-- <input class="form-control" type="hidden" id="formFile" name="excelFile" value="{{$excelFile}}"> --}}
                <div class="mb-3 col-md-6">
                    <label for="token" class="form-label">Your Token</label>
                    <input class="form-control" type="text" id="token" name="token">
                    @error('token')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    <section id="loading">
                        <div id="loading-content"></div>
                    </section>
                <input type="submit" name="submitPreview" class="btn btn-secondary" onclick="showLoading()"
                    value="Submit">
            </form>
        </div>
    </div>
    <br><br>
@endsection
