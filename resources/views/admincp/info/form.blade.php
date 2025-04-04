@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Thông tin website</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {!! Form::open(['route' => ['info.update', $info->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        <div
                            class="form-group>
                        {!! Form::label('title', 'Tiêu đề website', []) !!}
                        {!! Form::text('title', isset($info) ? $info->title : '', [
                            'class' => 'form-control',
                            'placeholder' => 'Nhập vào dữ liệu ...',
                        ]) !!}
                    </div>
                    <br>
                        <div
                            class="form-group>
                            {!! Form::label('description', 'Mô tả website', []) !!}
                            {!! Form::textarea('description', isset($info) ? $info->description : '', [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu ...',
                                'id' => 'description',
                                'required',
                            ]) !!}
                        </div>
                        <br>
                        <div
                        class="form-group>
                        {!! Form::label('copyright', 'Thông tin website', []) !!}
                        {!! Form::text('copyright', isset($info) ? $info->copyright : '', [
                            'class' => 'form-control',
                            'placeholder' => 'Nhập vào dữ liệu ...',
                        ]) !!}
                    </div>
                    <br>
                        <div class="form-group>
                        {!! Form::label('Image', 'Hình ảnh logo', []) !!}
                        {!! Form::file('image', ['class' => 'form-control-file', 'required']) !!}
                        <br>
                        @if (isset($info))
                        <img width="20%"
                            src="{{ asset('uploads/logo/' . $info->logo) }}">
                            @endif
                        </div>
                        <br>
                        {!! Form::submit('Cập nhật thông tin website', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
