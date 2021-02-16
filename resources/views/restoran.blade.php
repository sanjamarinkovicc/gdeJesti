@extends('master')

@section('title','Restoran')

<style>
  body {
  font-family: "Roboto", sans-serif;
}

.wrapper {
  position: absolute;
  display: -webkit-box;
  display: -moz-box;
  display: box;
  display: -webkit-flex;
  display: -moz-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -moz-box-align: center;
  box-align: center;
  -webkit-align-items: center;
  -moz-align-items: center;
  -ms-align-items: center;
  -o-align-items: center;
  align-items: center;
  -ms-flex-align: center;
  -webkit-box-pack: center;
  -moz-box-pack: center;
  box-pack: center;
  -webkit-justify-content: center;
  -moz-justify-content: center;
  -ms-justify-content: center;
  -o-justify-content: center;
  justify-content: center;
  -ms-flex-pack: center;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.1);
}

.widget {
  width: 100%;
  max-width: 430px;
  height: 452px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  background-color: #fff;
  border-radius: 4px;
  overflow: hidden;
  position: relative;
  -webkit-box-shadow: 0px 7px 30px 0px rgba(50, 50, 50, 0.32);
  -moz-box-shadow: 0px 7px 30px 0px rgba(50, 50, 50, 0.32);
  box-shadow: 0px 7px 30px 0px rgba(50, 50, 50, 0.32);
  -webkit-transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  -moz-transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.widget__photo {
  width: 100%;
  height: 300px;
  -webkit-transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  -moz-transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  position: relative;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.widget__photo:after {
  -webkit-transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  -moz-transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  content: "";
  width: 100%;
  height: 100%;
  position: absolute;
  background-color: rgba(0, 0, 0, 0.6);
  top: 0;
  left: 0;
  opacity: 0;
  z-index: 10;
}

.widget__details {
  padding: 30px;
  position: relative;
}

.widget__badges {
  position: absolute;
  right: 30px;
  top: 30px;
}

.widget__badge {
  font-size: 12px;
  display: inline-block;
  border: 1px solid rgba(0, 0, 0, 0.2);
  color: rgba(0, 0, 0, 0.5);
  width: 40px;
  text-align: center;
  padding: 2px 0;
  border-radius: 3px;
}

.widget__badge.widget__badge--rating {
  background-color: #14C852;
  border-color: #14C852;
  color: #fff;
}

.widget__name {
  font-size: 18px;
  color: rgba(0, 0, 0, 0.8);
  font-weight: 600;
  width: 100%;
  padding: 0 80px 0 0;
}

.widget__type {
  font-size: 12px;
  color: rgba(0, 0, 0, 0.6);
}

.widget__info span {
  color: rgba(0, 0, 0, 0.7);
  font-size: 14px;
  display: block;
  width: 100%;
  margin-bottom: 4px;
}
.widget__info span:first-of-type {
  margin-top: 15px;
}

.widget__table {
  width: 100%;
}
.widget__table tr td {
  color: rgba(0, 0, 0, 0.7);
  line-height: 25px;
}
.widget__table tr td:first-child {
  color: rgba(0, 0, 0, 0.4);
}

.widget__overlay {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
}

.widget__button {
  cursor: pointer;
  -webkit-transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  -moz-transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
  position: absolute;
  margin: 0 auto;
  padding: 10px 0;
  width: 70%;
  background-color: #14C852;
  border-radius: 4px;
  color: #fff;
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 600;
  font-size: 12px;
  left: 0;
  right: 0;
  top: -40px;
}

.widget:hover .widget__button {
  top: 32px;
}
.widget:hover .widget__photo {
  height: 100px;
  -webkit-transform: scale(1.3);
  -moz-transform: scale(1.3);
  -ms-transform: scale(1.3);
  -o-transform: scale(1.3);
  transform: scale(1.3);
}
.widget:hover .widget__photo:after {
  opacity: 1;
}
.widget:hover .widget__overlay {
  visibility: visible;
  opacity: 1;
}
</style>

@section('content')

    <div class='wrapper'>
    <div class='widget'>
      <div class='widget__photo' style="background: url('{{$restoran->slika}}');"></div>

      <div class='widget__details'>
        <div class='widget__badges'>

          <div class='widget__badge widget__badge--rating'>
          {{$restoran->ocena}}
          </div>
        </div>
        <div class='widget__name'>
        {{$restoran->ime}}
        </div>
        <div class='widget__info'>
          <span>
          {{$restoran->opis}}
          </span>

        </div>
        <div class='widget__hidden'>
          <hr>
          <table class='widget__table'>
            <tr>
              <td>
                Adress
              </td>
              <td>
              {{$restoran->adresa}}
              </td>
            </tr>
            <tr>
              <td>
                City
              </td>
              <td>
              {{$restoran->grad}}
              </td>
            </tr>
            <tr>
              <td>
               Rating
              </td>
              <td>
              {{$restoran->ocena}}
              </td>
            </tr>
            <tr>
              <td>
                Wi-Fi
              </td>
              <td>
                Yes
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection
