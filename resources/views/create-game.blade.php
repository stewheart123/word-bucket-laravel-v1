
@extends('layouts.app')
@section('create-game')
<h1>create a game</h1>

<section class="game-maker-wizard">
    <div class="container bg-dark bg-gradient text-white mb-3 pb-2">
        <div class="row ">
            <div>
                <div class="d-flex input-flex">
                    <div class="field-inner">
                        <label> native word</label>
                        <input type="text" value="" class="native-input">
                    </div>
                    <span class="mt-4">=</span>
                    <div class="field-inner">
                        <label> foreign word</label>
                        <input type="text" value="" class="foreign-input">
                    </div>
                    <div class="field-inner">
                        <label>helper</label>
                        <input type="text" value="" class="helper-input">
                    </div>
                    <!-- <div class="remove-word-button btn btn-secondary btn-lg mt-4">Remove Word</div> -->
                </div>
                <!-- can update by bringing in language dropdowns -->
                </div>
            <div id="add-word-button" class="btn btn-primary btn-lg col-2 mx-4">Add Word</div>
            <!-- can update by bringing in language dropdowns -->
        </div>
    <div class="row mb-5">
<form action="/create-game" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
          <div class="form-group row">
              <div class="col-lg-12 p-3 m-2 mt-2">

                <label class="h3">select native language</label>
              <select id='native-select' class="ms-3" name="GM_NATIVE_SHORTHAND">
                @foreach($languages as $native)
                    <option value="{{$native->LA_SHORTHAND}}">{{$native->LA_DISPLAY_NAME}}
                    </option>
                @endforeach
                </select>

                <label class="h3 ms-5">select foreign language</label>
              <select id='foreign-select' class="ms-3" name="GM_FOREIGN_SHORTHAND">
                @foreach($languages as $native)
                    <option value="{{$native->LA_SHORTHAND}}">{{$native->LA_DISPLAY_NAME}}
                    </option>
                @endforeach
                </select>
            </div>
            <div class="col-lg-12 p-3 m-2">
                <label for="GM_TITLE" class="col-sm-12 col form-label h3" style="font-weight: bold;">Game Title</label>
                <input class="mb-3" type="text" class="form-control form-control-sm" name="GM_TITLE">
                <label for="GM_CONTENTS" class="col-sm-12 col form-label h3 d-none" style="font-weight: bold;"></label>
                <textarea id="gmc-text-area" class="mb-3 h-25 w-50 d-none" type="file" class="form-control form-control-sm" name="GM_CONTENTS"></textarea>

                <label for="GM_DESCRIPTION" class="col-sm-12 col form-label h3" style="font-weight: bold;">Game description</label>
                <textarea class="mb-3 h-25 w-50" type="text" class="form-control form-control-sm w-100" name="GM_DESCRIPTION" ></textarea>

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
      <div class="d-flex pb-4">
          <div id="ready-button" class="btn btn-primary btn-lg col-2 mx-4">Ready</div>
          <button id="submit" type="submit" class="btn btn-warning btn-lg mx-2 d-block d-none">Submit</button>
      </div>
    </form>
    </div><!-- row -->
    </div><!-- container -->
  @if (!empty($message)) 
  {{ $message }}
  @endif
  <script type="text/javascript" src="{{asset('js/game-maker-wizard.js')}}"></script>
  @endsection