@extends('layouts.admin')

@section('main')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
					<li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Danh mục</a></li>
					<li class="breadcrumb-item active">Thêm danh mục</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="create-form" action="{{ route('admin.category.store') }}" method="POST">
					@csrf

					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-body">
									<div class="form-group">
										<label class="required" for="name">Tên</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nhập tên">

										@error('name')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="slug">Đường dẫn (Để trống sẽ tự động tạo)</label>
										<input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Nhập dường dẫn">

										@error('slug')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="description">Mô tả</label>
										<textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="10" placeholder="Nhập mô tả"></textarea>

										@error('description')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5>Xuất bản</h5>
								</div>

								<div class="card-body">
									<button type="submit" class="btn btn-success">
										<i class="fal fa-check-circle"></i> Lưu
									</button>
									<a href="{{ route('admin.category.index') }}" class="btn btn-danger">
										<i class="fal fa-save"></i> Huỷ
									</a>
								</div>
							</div>
							
							<div class="card">
								<div class="card-header">
									<h5>Trạng thái</h5>
								</div>

								<div class="card-body">
									<select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
										<option value="1" selected>Kích hoạt</option>
										<option value="0">Bản nháp</option>
									</select>

									@error('status')
									<span class="invalid-feedback" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>

							<div class="card">
								<div class="card-header">
									<h5>Hình ảnh</h5>
								</div>

								<div class="card-body">
									<div class="input-group">
										<span class="input-group-btn">
											<a id="lfm" data-input="image" data-preview="holder" data-type="category" class="btn btn-primary text-white">
												<i class="fa fa-picture-o"></i> Choose
											</a>
										</span>
										<input class="form-control @error('image') is-invalid @enderror" type="text" name="image" id="image">

										@error('image')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div id="holder" style="margin-top:15px;max-height:100px;"></div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@stop

@section('script')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
	$(function() {
		$('#lfm').filemanager('category');
	});
</script>
@stop