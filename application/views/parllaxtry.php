<link rel="stylesheet" type="text/css" href="<?echo base_url()?>assets/styles/ros_style.css">
<script src="<?echo base_url()?>assets/scripts/libraries.min.js"></script>
<script src="<?echo base_url()?>assets/scripts/parllax.js"></script>
<script type="text/javascript">
var $html = $('html'),
			$container = $('#container'),
			$prompt = $('#prompt'),
			$toggle = $('#toggle'),
			$about = $('#about'),
			$scene = $('#scene');

	// Hide browser menu.
	(function() {
		setTimeout(function(){window.scrollTo(0,0);},0);
	})();

	// Setup FastClick.
	FastClick.attach(document.body);

	// Add touch functionality.
	if (Hammer.HAS_TOUCHEVENTS) {
		$container.hammer({drag_lock_to_axis: true});
		_.tap($html, 'a,button,[data-tap]');
	}

	// Add touch or mouse class to html element.
	$html.addClass(Hammer.HAS_TOUCHEVENTS ? 'touch' : 'mouse');

	// Resize handler.
	(resize = function() {
		$scene[0].style.width = window.innerWidth + 'px';
		$scene[0].style.height = window.innerHeight + 'px';
		if (!$prompt.hasClass('hide')) {
			if (window.innerWidth < 600) {
				$toggle.addClass('hide');
			} else {
				$toggle.removeClass('hide');
			}
		}
	})();

	// Attach window listeners.
	window.onresize = _.debounce(resize, 200);
	window.onscroll = _.debounce(resize, 200);

	function showDetails() {
		$about.removeClass('hide');
		$toggle.removeClass('i');
	}

	function hideDetails() {
		$about.addClass('hide');
		$toggle.addClass('i');
	}

	// Listen for toggle click event.
	$toggle.on('click', function(event) {
		$toggle.hasClass('i') ? showDetails() : hideDetails();
	});

	// Pretty simple huh?
	$scene.parallax();

	// Check for orientation support.
	setTimeout(function() {
		if ($scene.data('mode') === 'cursor') {
			$prompt.removeClass('hide');
			if (window.innerWidth < 600) $toggle.addClass('hide');
			$prompt.on('click', function(event) {
				$prompt.addClass('hide');
				if (window.innerWidth < 600) {
					setTimeout(function() {
						$toggle.removeClass('hide');
					},1200);
				}
			});
		}
	},1000);
	</script>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<img src=""></img>
	<input type="text"  name="ck"/> <input type="submit" name="Submit"><br>
	<div id="container" class="wrapper">
		<ul id="scene" class="scene unselectable"
			data-friction-x="0.1"
			data-friction-y="0.1"
			data-scalar-x="25"
			data-scalar-y="15">
			<li class="layer" data-depth="1.00"><div class="lighthouse depth-0"></div></li>

			<li class="layer" data-depth="0.30"><div class="wave paint depth-30"></div></li>
			<li class="layer" data-depth="0.40"><div class="wave plain depth-40"></div></li>
			<li class="layer" data-depth="0.50"><div class="wave paint depth-50"></div></li>

			
			
			<li class="layer" data-depth="0.60"><div class="wave plain depth-60"></div></li>
			<li class="layer" data-depth="0.80"><div class="wave plain depth-80"></div></li>
			<li class="layer" data-depth="0.50"><div class="wave paint depth-90"></div></li>
			<li class="layer" data-depth="1.00"><div class="wave paint depth-100"></div></li>
		</ul>
