<!DOCTYPE html>
<html>
<head>
	<title>Sms confirmation</title>
	 <link rel="shortcut icon" type="x-icon" href="../img/about-img.jpg" />
</head>
<body>
	  <!-- start header -->
                <?php  include"header.php" ?>
    <!-- end header -->


    <div class="qfc-container" style="margin-top: 200px;width: 410px;border-radius: 20px;">
    	<form method="post" enctype="multipart/form-data">
    	<label style="color: green;font-weight: bold;font-size: 30px;">Confirmé votre numero </label>
    	<input placeholder="Entrer le code reçu" type="text" name="code" required style="width: 300px;margin-top: 20px">
    	<div style=";padding: 15px;margin-left: 76px;">
          <button type="submit" name="envoye" >Validé</button>
        </div>
        </form>
    </div>


			    <style>
			  a {
			    color :#00bcd4;
			    text-decoration: none;
			  }
			@import url('https://fonts.googleapis.com/css?family=Roboto');
			@import url("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css");
			body {
			    --main-bg-color: white;
			    background: var(--main-bg-color);
			}

			.qfc-container {
			  --form-theme-color: #00bcd4;
			  --form-bg-color: white;
			  --input-text-color: black;
			  --button-hover: #4e5050;
			  --input-bg-gray: #E2E5E5;
			  border: 4px solid var(--form-theme-color);
			  /* border-top: 7px solid var(--form-theme-color); */
			  font-size: 1em;
			  font-family: 'Roboto', sans-serif;
			  background-color: var(--form-bg-color);
			  padding: 35px;
			  width: 80%;
			  margin: 30px auto;
			  margin-top: 30px;
			}

			.qfc-container ::-webkit-input-placeholder {
			  /* Chrome/Opera/Safari */
			  color: var(--input-text-color);
			}

			.qfc-container ::-moz-placeholder {
			  /* Firefox 19+ */
			  color: var(--input-text-color);
			}

			.qfc-container :-ms-input-placeholder {
			  /* IE 10+ */
			  color: var(--input-text-color);
			}

			.qfc-container :-moz-placeholder {
			  /* Firefox 18- */
			  color: var(--input-text-color);
			}

			.qfc-container input {
			  width: 200px;
			  display: block;
			  border: none;
			  padding: 12px !important;
			  border-bottom: solid 1px var(--form-theme-color);
			  -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
			  transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
			  background-repeat: no-repeat;
			  color: var(--input-text-color);
			}

			.qfc-container input:focus,
			input:valid {
			  box-shadow: none;
			  outline: none;
			  background-position: 0 0;
			}

			.qfc-container input::-webkit-input-placeholder {
			  font-family: 'roboto', sans-serif;
			  -webkit-transition: all 0.3s ease-in-out;
			  transition: all 0.3s ease-in-out;
			}

			.qfc-container input:focus::-webkit-input-placeholder,
			input:valid::-webkit-input-placeholder {
			  color: var(--form-theme-color);
			  font-size: 11px;
			  -webkit-transform: translateY(-20px);
			  transform: translateY(-20px);
			  visibility: visible !important;
			}

			.qfc-container h1 {
			  font-size: 112px;
			  font-weight: 300;
			  letter-spacing: -5px;
			  line-height: 128px;
			}

			.qfc-container h2 {
			  font-size: 26px;
			  line-height: 64px;
			}

			.qfc-container h3 {
			  font-size: 45px;
			  line-height: 64px;
			}

			.qfc-container h4 {
			  font-size: 34px;
			  line-height: 52px;
			}

			.qfc-container h5 {
			  font-size: 24px;
			  line-height: 44px;
			}

			.qfc-container h6 {
			  font-size: 20px;
			  font-weight: 600;
			  line-height: 44px;
			}

			.qfc-container h1,
			h2,
			h3,
			h4,
			h5,
			h6 {
			  text-decoration: none;
			  position: relative;
			  margin: 15px 0 0;
			  font-weight: 400;
			}

			.qfc-container h1:not(.no-underline):after,
			.qfc-container h2:not(.no-underline):after,
			.qfc-container h3:not(.no-underline):after,
			.qfc-container h4:not(.no-underline):after,
			.qfc-container h5:not(.no-underline):after,
			.qfc-container h6:not(.no-underline):after {
			  content: '';
			  position: relative;
			  display: block;
			  bottom: 0;
			  margin-bottom: 31px;
			  width: 100%;
			  border: 1px solid var(--form-theme-color);
			}

			.qfc-container .no-underline+h1,
			.qfc-container .no-underline+h2,
			.qfc-container .no-underline+h3,
			.qfc-container .no-underline+h4,
			.qfc-container .no-underline+h5,
			.qfc-container .no-underline+h6 {
			  margin-top: 0;
			}

			.qfc-container input[type="checkbox"] {
			  margin-left: 0px;
			  display: inline-block;
			  position: relative;
			  -webkit-appearance: none;
			  height: 2em;
			  width: 4em;
			  border-radius: 1.5em;
			  background-color: var(--input-bg-gray);
			  border: none;
			  background-clip: padding-box;
			  color: #919FAF;
			  vertical-align: middle;
			}

			.qfc-container input[type="checkbox"]::before {
			  content: "";
			  position: absolute;
			  left: 0;
			  top: 0;
			  bottom: 0;
			  right: 50%;
			  background-color: white;
			  border-radius: 100%;
			  border: 2px solid transparent;
			  -webkit-transition: all 0.5s ease;
			  transition: all 0.5s ease;
			  background-clip: padding-box;
			  z-index: 2;
			}

			.qfc-container input[type="checkbox"]::after {
			  position: absolute;
			  left: 0.675em;
			  top: 0.35em;
			  font-family: "Ionicons";
			  content: "\f122\f12a";
			  letter-spacing: 0.75em;
			  z-index: 1;
			}

			.qfc-container label {
			  font-weight: 400;
			}

			.qfc-container input[type="checkbox"]:focus,
			input[type="radio"]:focus {
			  color: white;
			  border: none;
			  border-color: transparent;
			  background-color: #919FAF;
			}

			.qfc-container input[type="checkbox"]:checked {
			  color: white;
			  background-color: var(--form-theme-color);
			  border-color: transparent;
			}

			.qfc-container input[type="checkbox"]:checked::before {
			  -webkit-transform: translateX(100%);
			  transform: translateX(100%);
			}

			.qfc-container form {
			  padding-top: 20px;
			}

			.qfc-container div {
			  margin-top: 5px;
			  margin-bottom: 15px;
			}

			.qfc-container input[type="radio"] {
			  width: 30px;
			  display: inline-block;
			}

			.qfc-container input,
			select {
			  border: none;
			  border-bottom: 1px solid var(--form-theme-color);
			  color: var(--input-text-color);
			  font-family: sans-serif;
			  font-weight: 500;
			  font-size: 1em;
			  border-radius: 0;
			  line-height: 22px;
			  display: block;
			  padding: 5px;
			  width: 60%;
			  -webkit-box-sizing: border-box;
			  -moz-box-sizing: border-box;
			  -ms-box-sizing: border-box;
			  box-sizing: border-box;
			}

			.qfc-container textarea {
			  border: none;
			  border-bottom: 2px solid var(--form-theme-color);
			  color: var(--input-text-color);
			  font-weight: 500;
			  font-size: 1em;
			  border-radius: 0;
			  line-height: 22px;
			  display: block;
			  padding: 5px;
			  width: 100%;
			  -webkit-box-sizing: border-box;
			  -moz-box-sizing: border-box;
			  -ms-box-sizing: border-box;
			  box-sizing: border-box;
			}

			.qfc-container input:focus,
			textarea:focus,
			select:focus {
			  border-bottom: 3px solid var(--form-theme-color);
			  color: var(--form-theme-color);
			  font-weight: 600;
			  outline: none;
			}

			.qfc-container input[type='radio']:after {
			  width: 20px;
			  height: 20px;
			  border-radius: 100px;
			  margin-left: 4px;
			  position: relative;
			  background-color: white;
			  content: '';
			  display: inline-block;
			  visibility: visible;
			  border: 5px solid var(--input-bg-gray);
			}

			.qfc-container input[type='radio']:checked:after {
			  width: 20px;
			  height: 20px;
			  border-radius: 100px;
			  position: relative;
			  background-color: var(--form-theme-color);
			  content: '';
			  display: inline-block;
			  visibility: visible;
			  border: 5px solid var(--input-bg-gray);
			}

			.qfc-container textarea {
			  height: 10em;
			}

			.qfc-container select {
			  margin-top: 5px;
			  background: white;
			  -webkit-appearance: none;
			  -moz-appearance: none;
			  background-position: right 50%;
			  background-repeat: no-repeat;
			  background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAMCAYAAABSgIzaAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDZFNDEwNjlGNzFEMTFFMkJEQ0VDRTM1N0RCMzMyMkIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NDZFNDEwNkFGNzFEMTFFMkJEQ0VDRTM1N0RCMzMyMkIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0NkU0MTA2N0Y3MUQxMUUyQkRDRUNFMzU3REIzMzIyQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0NkU0MTA2OEY3MUQxMUUyQkRDRUNFMzU3REIzMzIyQiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PuGsgwQAAAA5SURBVHjaYvz//z8DOYCJgUxAf42MQIzTk0D/M+KzkRGPoQSdykiKJrBGpOhgJFYTWNEIiEeAAAMAzNENEOH+do8AAAAASUVORK5CYII=);
			}

			.qfc-container button,
			input[type='button'],
			input[type='reset'],
			input[type='submit'] {
			  font-family: inherit;
			  line-height: 0;
			  font-size: .8em;
			  padding: 0;
			  width: 86px;
			  height: 36px;
			  border: 0;
			  cursor: pointer;
			  background-color: var(--form-theme-color);
			  color: white;
			  -webkit-transition: all 0.3s;
			  -moz-transition: all 0.3s;
			  transition: all 0.3s;
			  font-weight: 600;
			  text-transform: uppercase;
			}

			.qfc-container select[multiple] {
			  background: none;
			}

			.qfc-container button:hover,
			input[type='button']:hover,
			input[type='reset']:hover,
			input[type='submit']:hover {
			  background: var(--button-hover);
			  transition: all .3s;
			}

			@media screen and (max-width: 900px) {
			  .qfc-container {
			      width: 70%;
			  }
			  .qfc-container input,
			  select {
			      width: 100%;
			  }
			}
			</style>

     <script src="../js/vendor/jquery-2.2.4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="../js/vendor/bootstrap.min.js"></script>           
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
            <script src="../js/easing.min.js"></script>         
            <script src="../js/hoverIntent.js"></script>
            <script src="../js/superfish.min.js"></script>  
            <script src="../js/jquery.ajaxchimp.min.js"></script>
            <script src="../js/jquery.magnific-popup.min.js"></script>  
            <script src="../js/jquery-ui.js"></script>          
            <script src="../js/owl.carousel.min.js"></script>                       
            <script src="../js/jquery.nice-select.min.js"></script>                         
            <script src="../js/mail-script.js"></script>    
            <script src="../js/main.js"></script>
</body>
</html>