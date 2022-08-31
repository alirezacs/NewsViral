@extends('Admin.Layouts.master')

@section('content')

    <div id="flFormsGrid" class="col-lg-10 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>فرم ثبت خبر</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="title">موضوع</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="موضوع خبر...">
                    </div>

                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="release">تاریخ انتشار</label>
                            <input type="text" class="form-control" id="release" name="released" placeholder="تاریخ انتشار خبر...">
                        </div>
                        <div class="form-group mb-4">
                            <label for="last_update">تاریخ اخرین اپدیت</label>
                            <input type="text" class="form-control" id="last_update" name="last_update" placeholder="تاریخ اخرین اپدیت خبر">
                        </div>
                    </div>


                    <div class="form-group mb-4">
                        <label for="text">متن خبر</label>
                        <textarea name="text" id="text" class="form-control"></textarea>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-4">
                            <label for="author_id">نویسنده</label>
                            <select id="author_id" class="form-control" name="author_id">
                                <option value="1">option 1</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="reading_time">زمان مورد نیاز مطالعه</label>
                            <input type="text" class="form-control" id="reading_time" name="reading_time">
                            <span>به دقیقه</span>
                        </div>
                    </div>
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label for="image">عکس های خبر</label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" class="form-control-file" name="image[]" multiple>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                    <div class="form-group">
                        <div class="form-check pl-0">
                            <div class="custom-control custom-checkbox checkbox-info">
                                <input type="checkbox" class="custom-control-input" id="is_published" name="is_published">
                                <label class="custom-control-label" for="is_published">منتشر در سایت</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">ورود</button>
                </form>

            </div>
        </div>
    </div>

@endsection
