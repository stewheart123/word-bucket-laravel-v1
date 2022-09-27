
@extends('layouts.app')
@section('create-game')
<section class="hero-home">
    <div class="container">
        <div class="hero-home__row d-flex">
            <div class="hero-home__text">
                <h1>Create your own curriculum</h1>
                <h2 class="h4">Input words you want to learn</h2>
                <ul>
                    <li class="h5">Set the native and foreign languages</li>
                    <li class="h5">Use the repeater to add as many words as you like <br>-more than 10 might be a bit too much...</li>
                    <li class="h5">Add helper text for any additional help or information information to give context to the words.</li>
                    <li class="h5">Private will make lists only available to you.</li>
                    <li class="h5">Public lists will be visible to anyone who follows you.</li>
                </ul>
            </div>
            <div class="hero-home__image-container">
                <div class="hero-home__circle-image" style="background-image:url('images/create-circle.jpg');"></div>
            </div>
        </div>
        <div class="row">
            <div class="hero-home__underline">
                <div class="hero-home__icon" style="background-image:url('images/anvil.png');"></div>
            </div>
        </div>
    </div>
</section>


<section class="game-maker game-maker-wizard">
<form action="/create-game" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="game-maker__paper-background container">
        <div class="row">
            <div class="col-12">
                <h3>Create a word list</h3>
            </div>
        </div>
        <div class="row">
            <div class="game-maker__row d-flex col-10 offset-1">
                <label for="GM_TITLE" class="h4" style="font-weight: bold;">Game Title</label>
                <input type="text" class="chalk-5 form-control form-control-sm" name="GM_TITLE">
            </div>
        </div>

        <div class="row">
            <div class="game-maker__row-textarea d-flex col-10 offset-1">
                <label for="GM_DESCRIPTION" class="h4" style="font-weight: bold;">Game description</label>
                <textarea type="text" class="chalk-5 form-control form-control-sm" name="GM_DESCRIPTION" ></textarea>
            </div>
        </div>

        <div class="row">
            <div class="game-maker__row d-flex col-10 offset-1">
                <label class="h4">select native language</label>
                  <select id='native-select' class="chalk-5" name="GM_NATIVE_SHORTHAND">
                        @foreach($languages as $native)
                            <option value="{{$native->LA_SHORTHAND}}" class="chalk-5">{{$native->LA_DISPLAY_NAME}}
                            </option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="game-maker__row d-flex col-10 offset-1">
                <label class="h4">select foreign language</label>
                    <select id='foreign-select' class="chalk-5" name="GM_FOREIGN_SHORTHAND">
                        @foreach($languages as $native)
                            <option value="{{$native->LA_SHORTHAND}}" class="chalk-5">{{$native->LA_DISPLAY_NAME}}
                            </option>
                        @endforeach
                    </select>
            </div>
        </div>

        <div class="row">
            <div class="game-maker__row d-flex col-10 offset-1">
                <label class="h4">select access</label>
                    <select class="chalk-5" name="GM_PUBLIC">
                        <option value="1" class="chalk-5">public</option>
                        <option value="0" class="chalk-5">private</option>
                    </select>
            </div>
        </div>

        <div class="row">
            <div class="game-maker__word-table col-10 offset-1">
                <div class="game-maker__table-head d-none d-md-flex row">
                        <div class="col-3">
                            <label class="h4">Native word</label>
                        </div>

                        <div class="col-3">
                            <label class="h4">Foreign word</label>
                        </div>

                        <div class="col-5">
                            <label class="h4">Helper text</label>
                        </div>
                </div>

                <div class="game-maker__table-head gm-input row">
                    <div class="label-holder">
                        <input type="text" value="" placeholder="native word" class="native-input chalk-5">
                    </div>

                    <div class="label-holder">
                        <input type="text" value="" placeholder="foreign word" class="foreign-input chalk-5">
                    </div>

                    <div class="game-maker__text-form-input">
                        <input type="text" value="" placeholder="helper text" class="helper-input chalk-5">
                    </div>
                    <!-- <div class="remove-word-button">Remove Word</div> -->
                </div>

                    <!-- can update by bringing in language dropdowns -->
                    </div>
                    <div class="row">
                        <div class="col-10 offset-1 p-0">
                            <div id="add-word-button">Add Word</div>
                        </div>
                    </div>
                <!-- can update by bringing in language dropdowns -->
            
        
    <div class="row">
        <label for="GM_CONTENTS" class=" form-label h3" style="font-weight: bold;"></label>
                <textarea id="gmc-text-area" class="d-none" type="file" class="form-control form-control-sm" name="GM_CONTENTS"></textarea>
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
      <div class="row">
        <div class="col-10 offset-1 d-flex p-0">
            <div id="ready-button" class="button button--orange text-center">Ready</div>
            <button id="submit" type="submit" class="button button--orange text-center d-block d-none">Submit</button>
        </div>
      </div>
    </div><!-- row -->
</div><!-- container -->
</form>
  @if (!empty($message)) 
  {{ $message }}
  @endif
  <script type="text/javascript" src="{{asset('js/game-maker-wizard.js')}}"></script>
  @endsection