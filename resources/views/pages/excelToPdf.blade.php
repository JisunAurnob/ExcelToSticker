@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="row justify-content-center align-content-center" style="height: 80vh">
        <div class="col-lg-12 text-center">
            <h1>Excel To Sticker</h1>
        </div>
        <div class="col-lg-6 d-flex justify-content-center">
            {{-- <a href="{{route('login')}}" class="btn btn-primary">Login</a> --}}
            <form action="{{ route('upload') }}" method="post" enctype='multipart/form-data'>
                {{ csrf_field() }}<br>
                <span class="text-danger">
                    @if (!empty($errormsg))
                        {{ $errormsg }}<br><br>
                    @endif
                </span>

                @error('token')
                    <span id="tokenErrMsg" class="text-danger">{{ $message }}</span><br><br>
                @enderror
                <div class="mb-3">
                    <label for="formFile" class="form-label">Input Excel File (.xlsx Only)</label>
                    <input class="form-control" type="file" id="formFile" name="excelFile" onchange="tokenVisible()">
                    <span id="formFileErrorMsg" class="text-danger"></span>
                    @error('excelFile')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <center><button class="btn btn-secondary" id="nextButton" type="button" onclick="tokenVisible()">Next</button></center> --}}

                <div class="mb-3 token-hidden" id="tokenSection">
                    <label for="token" class="form-label">Token</label>
                    <input class="form-control" type="text" id="token" name="token">
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ascOrder" value="1" id="ascOrder">
                            <label class="form-check-label" for="ascOrder">
                                Ascending Order
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dscOrder" value="1" id="dscOrder">
                            <label class="form-check-label" for="dscOrder">
                                Descending Order
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="srtX" value="1" id="srtX">
                            <label class="form-check-label" for="srtX">
                                Sort Off X Axis
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="srtY" value="1" id="srtY">
                            <label class="form-check-label" for="srtY">
                                Sort Off Y Axis
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="srtQ" value="1" id="srtQ">
                            <label class="form-check-label" for="srtQ">
                                Sort By Quadrant
                            </label>
                        </div>
                </div>
                <span id="tokenErrorMsg" class="text-danger"></span>
                <section id="loading">
                    <div id="loading-content"></div>
                </section>
                
                <center><input type="submit" id="sbmtBt" name="submitPreview" class="btn btn-secondary token-hidden"
                        onclick="showLoading()" value="Convert & Preview"></center>
                {{-- <input type="submit" name="submitDownload" class="btn btn-secondary" onclick="showLoading()"
                    onload="hideLoading()" value="Convert & Download"> --}}

                {{-- <a href="{{ route('dummyPreview') }}" class="btn btn-primary"> Dummy Preview Download</a> --}}
            </form>
        </div>
    </div>
@endsection
