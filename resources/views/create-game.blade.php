
@extends('layouts.app')
@section('create-game')
<h1>create games</h1>


<form action="/create-game" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
          <div class="form-group row">
              <div class="col-lg-12 p-3">

                <label for="GM_TITLE" class="col-sm-12 col form-label" style="font-weight: bold;">Game Title</label>
                <input class="mb-3" type="text" class="form-control form-control-sm" name="GM_TITLE">
                <label for="GM_CONTENTS" class="col-sm-12 col form-label" style="font-weight: bold;"></label>
                <textarea class="mb-3 h-25 col-lg-9" type="file" class="form-control form-control-sm" name="GM_CONTENTS"></textarea>

                <label for="GM_DESCRIPTION" class="col-sm-12 col form-label" style="font-weight: bold;">Game description</label>
                <textarea class="mb-3 h-25 col-lg-9" type="text" class="form-control form-control-sm" name="GM_DESCRIPTION" ></textarea>

                <select class="ms-3" name="GM_PUBLIC">
                    <option value="1">public</option>
                    <option value="0">private</option>
                </select>
              </div>
          </div> 
          @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
  @if (!empty($message)) 
  {{ $message }}
  @endif
  
  @endsection