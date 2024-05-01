<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery Example</title>

    <style type="text/css">
    /*** Body ***/
    /*===== GOOGLE FONTS =====*/
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap");

/*===== VARIABLES CSS =====*/
:root {
  --dark-color-lighten: #f2f5ff;
  --red-card: #a62121;
  --blue-card: #4bb7e6;
  --btn: #141414;
  --btn-hover: #3a3a3a;
  --text: #fbf7f7;
}

/*===== RESET =====*/
*,
::before,
::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  height: 100vh;
  width: 100vw;
  background-color: var(--dark-color-lighten);
  font-family: "Montserrat", sans-serif;
}
button {
  font-family: "Montserrat", sans-serif;
  display: inline-block;
  border: none;
  outline: none;
  border-radius: 0.2rem;
  color: var(--text);
  cursor: pointer;
}

a {
  text-decoration: none;
}

img {
  max-width: 100%;
  height: 100%;
  user-select: none;
}

/*===== CARD =====*/
.container {
  height: 100%;
  width: 850px;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
}
.card {
  position: relative;
  padding: 1rem;
  width: 350px;
  height: 450px;
  box-shadow: -1px 15px 30px -12px rgb(32, 32, 32);
  border-radius: 0.9rem;
  background-color: var(--red-card);
  color: var(--text);
  cursor: pointer;
}

.card-blue {
  background: var(--blue-card);
}

.product-image {
  height: 230px;
  width: 100%;
  transform: translate(0, -1.5rem);
  transition: transform 500ms ease-in-out;
  filter: drop-shadow(5px 10px 15px rgba(8, 9, 13, 0.4));
}
.product-info {
  text-align: center;
}

.card:hover .product-image {
  transform: translate(-1.5rem, -7rem) rotate(-20deg);
}

.product-info h2 {
  font-size: 1.4rem;
  font-weight: 600;
}
.product-info p {
  margin: 0.4rem;
  font-size: 0.8rem;
  font-weight: 600;
}
.price {
  font-size: 1.2rem;
  font-weight: 500;
}
.btn {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  margin-top: 0.8rem;
}
.open-btn {
  background-color: var(--btn);

}
.edit-btn {
  background-color: var(--btn);
  padding: 0.6rem 3.5rem;
  font-weight: 600;
  font-size: 1rem;
  transition: 300ms ease;
}
.buy-btn:hover {
  background-color: var(--btn-hover);
}
.fav {
  box-sizing: border-box;
  background: #fff;
  padding: 0.5rem 0.5rem;
  border: 1px solid#000;
  display: grid;
  place-items: center;
}

.svg {
  height: 25px;
  width: 25px;
  fill: #fff;
  transition: all 500ms ease;
}

.fav:hover .svg {
  fill: #000;
}

@media screen and (max-width: 800px) {
  body {
    height: auto;
  }
  .container {
    padding: 2rem 0;
    width: 100%;
    flex-direction: column;
    gap: 3rem;
  }
}


</style>
</head>
<body>
<!-- Content-->
@isset($albumList)
@foreach ($albumList as $list )

      <!-- Card-->
      <main class="container">
        <section class="card">
          <div class="product-image">
            <img src="{{ $firstPic }}" alt="OFF-white Red Edition" draggable="false" />
          </div>
          <div class="product-info">
            <h2> {{$list->aName}}</h2>


            <div class="price">max picture : {{ $list->maxPic }}</div>
          </div>
          <div class="btn">


            <a href=""> Open Album</a>

            <a href="{{url('/Aedit/'.$list->id)}}"> Edit Name</a>
            <br>
            <a href="{{url('/Adelete/'.$list->id)}}"   >delete</a>

          </div>
        </section>

      </main>
      @endforeach
      @endisset


      <!-- Card -->
      <!-- Card-->








      <!-- Card-->




      <!-- Card-->

      <!-- Card-->
      <!-- Card-->


  <!---->
  <!-- Footer items-->
  <!---->
  <!-- Footer-->
  <footer class="footer">
    <p>Created by <a class="yo" href="https://codepen.io/hluebbering">Hannah Luebbering</a> | 2023 </p>
    <div class="footer-social">

      <a class="footer-social-link" href="https://codepen.io/hluebbering" target="__blank">
        <i class="fa fa-codepen"></i>
      </a>
      <a class="footer-social-link" href="https://hluebbering.github.io/" target="__blank">
        <i class="fa fa-link"></i>
      </a>
      <a class="footer-social-link" href="https://github.com/hluebbering" target="__blank">
        <i class="fa fa-github"></i>
      </a>
      <a class="footer-social-link" href="https://www.linkedin.com/in/hannah-luebbering-99609818a/" target="__blank">
        <i class="fa fa-linkedin"></i>
      </a>
      <a class="footer-social-link" href="https://open.spotify.com/user/hannahluebbering" target="__blank">
        <i class="fa fa-spotify"></i>
      </a>
    </div>
  </footer>
</body>
</html>
