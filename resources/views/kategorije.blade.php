@extends('master')

@section('title','Restorani')

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

    /* box-sizing FTW - http://paulirish.com/2012/box-sizing-border-box-ftw/  */

* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

/* === INTERESTING STUFF GOES HERE === */

html { -webkit-transform: translate3d(0, 0, 0); }

body { font-family: Arial, "Helvetica Neue", Helvetica, sans-serif }

img { max-width: 100% }

ul { padding: 0 }

h1 {
  margin: 0 12px 0 0;
  font-family: "skolar",serif;
  float: right;
  line-height: 50px;
  vertical-align: middle;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
}

a { color: #d13400; text-decoration: none; display: block;  }



/* === SPRITES === */

.menu-mobile {
  float: left;
  margin: 0 12px 0 12px;
  vertical-align: middle;
  display: block;
  background-image: url('http://www.alwaystwisted.com/playground/img/sprites.png');
  background-repeat: no-repeat;
  width: 36px;
  height: 36px;
  margin-top: 2px;
}

.menu-button { background-position: -32px -292px; }

/*li:hover i {
  background-position-x: -32px;
}*/
li:hover {
  background: rgba(0, 0, 0, 0.15);
}
li:hover a {
  text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.3);
}

@media screen and (min-width: 48em) {
  #menu-button { visibility: hidden }
}



header {
  background-color: #F5F5F5;
  border-bottom: 1px solid #3e3f3f;
  position: relative;
  height: 50px;

}


[role="navigation"] {
  background: #5C5C5C;
  font-family: sans-serif;
  font-weight: 700;
}

[role="navigation"] ul {
  margin: 0;
  padding: 0;
  border-bottom: 1px solid #6a6a6a;
}

[role="navigation"] li {
  color: #6d6d6d;
  padding-left: 24px;
  position: relative;
  display: block;
  border-bottom: 1px solid #3e3f3f;
  border-top: 1px solid #6a6a6a;
}

@media screen and (min-width: 48em) {
  [role="navigation"] li { border-left: none }
}

[role="navigation"] li:first-of-type { border-top: 1px solid #3e3f3f }
[role="navigation"] li:last-of-type { border-bottom-color: #3e3f3f; }


[role="navigation"] a {
  position: relative;
  display: block;
  line-height: 48px;
  font-size: 20px;
  vertical-align: middle;
  text-decoration: none;
  color: #FFF;
}

[role="navigation"], [role="main"] { width: 100% }

.js #wrapper {
  display: -webkit-box;
  display:    -moz-box;
  display:         box;
  -webkit-box-orient: horizontal;
     -moz-box-orient: horizontal;
    -ms-box-orient: horizontal;
      box-orient: horizontal;
}


[role="main"], [role="banner"] {
  -webkit-box-shadow: -3px 0px 4px 0.5 1px 2px rgba(0, 0, 0, 0.1);
     -moz-box-shadow: -3px 0px 4px 0.5 1px 2px rgba(0, 0, 0, 0.1);
        box-shadow: -3px 0px 4px 0.5 1px 2px rgba(0, 0, 0, 0.1);

}

.js [role="navigation"] {
  margin-left: -100%;
  -webkit-box-ordinal-group: 1;
     -moz-box-ordinal-group: 1;
      -ms-box-ordinal-group: 1;
    	  box-ordinal-group: 1;
  -webkit-transition: all 0.1s ease-in-out;
     -moz-transition: all 0.1 S ease-in-out;
      -ms-transition: all 0.1s ease-in-out;
  	   -o-transition: all 0.1s ease-in-out;
  		  transition: all 0.1s ease-in-out;
}

[role="banner"] {
  width: 100%;
}
.js [role="banner"] {
  margin-left: 0;
  -webkit-box-ordinal-group: 2;
     -moz-box-ordinal-group: 2;
    	-ms-box-ordinal-group: 2;
        box-ordinal-group: 2;
}
.js [role="main"] {
  margin-left: -100%;
  margin-top: 50px;
  -webkit-box-ordinal-group: 3;
     -moz-box-ordinal-group: 3;
      -ms-box-ordinal-group: 3;
          box-ordinal-group: 3;
  padding: 1.5%;
}

.active-nav [role="navigation"] { background: #5C5C5C; margin-left: 0; width: 80%; }

.active-nav #clear-btn {
  position: absolute;
  top: 0;
  right: 0;
  height: 800px;
  width: 20%;
  background: transparent;
  z-index: 4;
}

.active-nav [role="main"] {
  overflow: hidden;
}

@media all and (min-width: 768px) {


  .js [role="navigation"] {
    background: #5C5C5C;
    width: 30%;
    margin-left: 0;
    -webkit-box-ordinal-group: 2;
       -moz-box-ordinal-group: 2;
    	  -ms-box-ordinal-group: 2;
    		  box-ordinal-group: 2;
  }

  .js [role="main"], .js [role="banner"] {
    width: 70%;
  }

  .js [role="banner"] {
  -webkit-box-ordinal-group: 1;
     -moz-box-ordinal-group: 1;
    -ms-box-ordinal-group: 1;
      box-ordinal-group: 1;
  }

  .active-nav #clear-btn { display: none }

}

@media all and (min-width: 800px) {
.js #wrapper {
    -webkit-box-orient: vertical;
       -moz-box-orient: vertical;
    	  -ms-box-orient: vertical;
    		  box-orient: vertical;
}
  .js [role="navigation"] {
    width: 100%;
    margin: 0 auto;
    padding: 0;
    text-align: center;
  }

  [role="navigation"] li{
    display: inline-block;
    padding: 0 12px;
    border: none;
    border-right: 1px solid #333;
  }


</style>

@section('content')


    <div id="wrapper">

  <a href="" id="clear-btn"></a>

  <header role="banner" style="background: none;">

    <a href="" id="menu-button" class="ir menu-mobile menu-button" role="presentation">menu</a>

  </header>
  <nav role="navigation">
    <ul>
    @foreach($kategorije as $kategorija)
      <li style="text-decoration:none;"><a style="text-decoration:none;" href="/{{$kategorija->id}}">{{$kategorija->naziv}}</a></li>
      @endforeach
    </ul>
    </nav>


</div>



<div class="container">


<div class="row text-center" style="display:flex; flex-wrap: wrap; margin-top: 100px;">

    @foreach($kategorije as $kategorija)
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
        @endforeach
</div>

</div>
@endsection
