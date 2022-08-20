
@extends('layouts.app')
@section('create-game')
<h1>create games</h1>

<section class="game-maker-wizard">
    <!-- can update by bringing in language dropdowns -->
    <div class="d-flex input-flex">
        <div class="field-inner">
            <label> native word</label>
            <input type="text" value="" class="native-input">
        </div>
        <span>=</span>
        <div class="field-inner">
            <label> foreign word</label>
            <input type="text" value="" class="foreign-input">
        </div>
        <div class="field-inner">
            <label>helper</label>
            <input type="text" value="" class="helper-input">
        </div>
        <div class="remove-word-button btn btn-warning btn-lg">Remove Word</div>
     </div>
    <div id="add-word-button" class="btn btn-primary btn-lg">Add Word</div>
    <div id="ready-button" class="btn btn-primary btn-lg">Ready</div>
</section>
<form action="/create-game" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
          <div class="form-group row">
              <div class="col-lg-12 p-3">

                <label for="GM_TITLE" class="col-sm-12 col form-label" style="font-weight: bold;">Game Title</label>
                <input class="mb-3" type="text" class="form-control form-control-sm" name="GM_TITLE">
                <label for="GM_CONTENTS" class="col-sm-12 col form-label" style="font-weight: bold;"></label>
                <textarea id="gmc-text-area" class="mb-3 h-25 w-100" type="file" class="form-control form-control-sm" name="GM_CONTENTS"></textarea>

                <label for="GM_DESCRIPTION" class="col-sm-12 col form-label" style="font-weight: bold;">Game description</label>
                <textarea class="mb-3 h-25 col-lg-9" type="text" class="form-control form-control-sm w-100" name="GM_DESCRIPTION" ></textarea>

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
  <script type="text/javascript" src="{{asset('js/game-maker-wizard.js')}}"></script>
  @endsection