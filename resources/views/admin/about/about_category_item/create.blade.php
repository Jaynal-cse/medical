@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
	<h3 class="block-title">Frontend Part</h3>
</div>
<div class="col-md-6">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}">
                <span class="ti-home"></span>
            </a>
        </li>
        <li class="breadcrumb-item">Frontend Part</li>
        <li class="breadcrumb-item">About Part</li>
        <li class="breadcrumb-item"><a href="{{route('about_category_item.index')}}">About Category Item</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
</div>
@endsection

@section('content')

    <!-- Main Content -->
    <div class="container-fluid">

        <div class="row">
            <!-- Widget Item -->
            <div class="col-md-12">
                <div class="widget-area-2 proclinic-box-shadow">
                    <h3 class="widget-title">Add About Category Item</h3>
                    <form action="{{route('about_category_item.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="about_category_id">About Category</label>
                                <select class="form-control" name="about_category_id" value="{{old('about_category_id')}}" placeholder="About Category" id="about_category_id">
                                <option value="">Select</option>
                                    @foreach($category as $key=> $categories)
                                    <option value="{{$categories->id}}">{{$categories->about_category}}</option>
                                    @endforeach
                                </select>
                                @error('about_category_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Title" id="title">
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="paragraph">Content</label>
                                <textarea type="text" class="form-control" name="paragraph" placeholder="Content" rows="8" id="paragraph">{{old('paragraph')}}</textarea>
                                @error('paragraph')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="bullet_point">Bullet Point</label>
                                <table>
                                    <tbody id="bullet_point">
                                        <tr>
                                            <td width="80%"><input type="text" name="bullet_point[]" class="form-control" value="{{old('bullet_point')}}" placeholder="Bullet Point" id="bullet_point"></td>
                                            <td width="20%">
                                                <div class="btn btn-group">
                                                    <button type="button" class="btn btn-sm btn-primary MedAddBtn" onclick="addItem()">Add</button>
                                                    <button type="button" class="btn btn-sm btn-danger MedRemoveBtn" disabled>Remove</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="file">Image</label>
                                <input type="file" name="image" class="form-control" value="{{old('image')}}" id="file">
                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="file">Multimedia</label>
                                <input type="file" name="multimedia" class="form-control" value="{{old('multimedia')}}" id="file">
                                @error('multimedia')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Widget Item -->
        </div>
    </div>
    <!-- /Main Content -->
@endsection

@section('js')
    <script>
        function addItem() {
            let tr = `<tr>
                        <td width="80%"><input type="text" name="bullet_point[]" class="form-control" value="{{old('bullet_point')}}" placeholder="Bullet Point" id="bullet_point"></td>
                        <td width="20%">
                            <div class="btn btn-group">
                                <button type="button" class="btn btn-sm btn-primary MedAddBtn" onclick="addItem()">Add</button>
                                <button type="button" class="btn btn-sm btn-danger MedRemoveBtn" onClick="removeTr(this)">Remove</button>
                            </div>
                        </td>
                        </tr>`
             $('#bullet_point').append(tr)
        }

        function removeTr(object)
        {
            $(object).closest('tr').remove()
        }
    </script>
@endsection
