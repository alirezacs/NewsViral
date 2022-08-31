@extends('Admin.Layouts.master')

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <a href="{{ route('news.create') }}" class="btn btn-success">ایجاد خبر</a>
    <div class="table-responsive mt-4 mb-4">
        <table class="multi-table table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th> موضوع </th>
                    <th> انتشار </th>
                    <th>اخرین اپدیت</th>
                    <th> زمان مطالعه </th>
                    <th> نویسنده </th>
                    <th class="text-center">وضیعت</th>
                    <th class="text-center">تغییر</th>
                    <th class="text-center">حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach($newses as $news)
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->release }}</td>
                        <td>{{ $news->last_update }}</td>
                        <td>{{ $news->reading_time }}</td>
                        <td>{{ $news->author_id }}</td>
                        <td>
                            <div class="t-dot {{ ($news->is_published?'bg-success':'bg-danger') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ ($news->is_published?'تایید شده' : 'تایید نشده') }}"></div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning btn-sm">تغییر</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('news.destroy', $news->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
