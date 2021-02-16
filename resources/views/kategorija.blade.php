@extends('master')

@section('title',$kategorija->naziv)

<style>
    html {
    position: relative;
    min-height: 100%;
  }
  body {
    /* Margin bottom by footer height */
    margin-bottom: 60px;
    overflow-x: hidden; /* Hide horizontal scrollbar */
  }
  .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    /* Set the fixed height of the footer here */
    height: 60px;
    background-color: #f5f5f5;
  }

  .container .text-muted {
    margin: 20px 0;
  }

  /* Thumbnail styles */
  .thumbnail img {
      width: 100%;
  }

  .thumbnail {
      padding: 0;
  }

  .thumbnail .caption-full {
      padding: 9px;
  }

  /* Google Map styles */
  #map {
      height: 400px;
      width: 100%;
  }

  /* Campground show page delete button */
  .delete-form {
      display: inline-block;
  }

  /* Flexbox grid fix */
  .flex-wrap {
    display:flex;
    flex-wrap: wrap;
  }

  .checked {
      color: orange;
  }

  .btnnext, .btnprev {
    color: purple;
    background-color: #C1CDCD	;
    border-radius: 12px;
  }

  .jumbopara {
    opacity: 0;
    transform: translateY(85px);
    transition: all 1s ease;
    font-size: 38px;
    font-family: 'Lemonada', cursive;
  }

  .jumbospan {
    font-size: 48px;
  }

  .paraeffect {
    opacity: 1;
    transform: translateY(0px);
  }

  .inputs {
    margin-top: 10px;
    opacity: 0;
    transform: translateY(85px);
    transition: all 1.5s ease;
  }

  .inputeffect {
    opacity: 1;
    transform: translateY(0px);
  }

  .buttons {
    padding-left: 45%;
    padding-top: 65px;
  }


  @media only screen and (max-width: 991px) {
    .buttons {
      padding-left: 40%;
      padding-top: 45px;
    }
  }


  @media only screen and (max-width: 800px) {
    .inputs {
      margin-top: 0px;
      width: 80vw;
    }
    .jumbopara {
      font-size: 16px;
    }
    .jumbospan {
      font-size: 28px;
    }
  }



</style>

@section('content')
    <h1 style="margin-left: 40vw;">{{$kategorija->naziv}} restorani</h1>
    <p style="margin-left: 100px; margin-top: 20px;">Dodaj novi restoran</p>
    <form style="margin-left: 100px; margin-top: 10px;" action="/dodaj" method="post">
        {{ csrf_field() }}
        <input type="text" name="ime" placeholder="ime">
        <input type="text" name="opis" placeholder="opis">
        <input type="text" name="adresa" placeholder="adresa">
        <input type="text" name="slika" placeholder="slika">
        <input type="text" name="grad" placeholder="grad">
        <input type="text" name="ocena" placeholder="ocena">
        <input style="display:none;" type="text" name="kategorija_id" value="{{$kategorija->id}}">
        <button type="submit">Save</button>
    </form>

    <div  class="container">


        <div class="row text-center" style="display:flex; flex-wrap: wrap; margin-top: 100px;">

        @foreach($kategorija->restorani as $restoran)
            <div class="col-md-3 col-sm-6">
                <div class="thumbnail" style="height: 340px;">
                    <img src="{{$restoran->slika}}" style="height: 200px;">
                    <div class="caption">
                        <h4>{{$restoran->ime}}</h4>
                        <h4>{{$restoran->ocena}}</h4>
                    </div>
                    <p>
                        <a href="{{$kategorija->id}}/{{$restoran->id}}" class="btn btn-primary">More Info</a>
                    </p>
                </div>
            </div>
            @endforeach
        </div>

    </div>



@endsection
