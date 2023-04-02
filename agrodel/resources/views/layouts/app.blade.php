<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>АгроДеталь - пора покупать в интернете!</title>
		<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" ></script>
		<script src="{{ asset('js/anim-menu.js') }}" type="text/javascript" ></script>
		<script src="{{ asset('js/page-ajax.js') }}" type="text/javascript" ></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>


		<div class="full-width">
			<header>
				<a class="to-main" href="{{ route('index')}}"><img src="{{ asset('images/logo.png') }}" alt="logo" class="logo"></a>
				<div class="phone">
					<img src="{{ asset('images/phone-logo.png') }}" alt="phone" class="phone-logo">
					<ul>
						<li class="phone-li phone-li1">+7(981)-969-29-57</li>
						<li class="phone-li phone-li2">+7(981)-969-29-57</li>
					</ul>
				</div>
				<img src="{{ asset('images/logo-right.png') }}" alt="logo-right" class="logo-right">
			</header>
		</div>


		<div class="wrapper">

			<div class="main-nav">
				<a href="#"><div id="java"><span class="nav-top">Меню</span></div></a>
				<ul class="nav-ul">
					<a href="{{ route('products.index') }}" class="nav-a">
						<li class="nav-li"><span class="nav-top">Товары</span></li>
					</a>
					<a href="{{ route('payment_info') }}" class="nav-a" id="oplata">
						<li class="nav-li"><span class="nav-top">Оплата и доставка</span></li>
					</a>
					<a href="{{ route('contacts') }}" class="nav-a" id="kontakty">
						<li class="nav-li"><span class="nav-top">Контакты</span></li>
					</a>
					<a href="{{ route('partner_info') }}" class="nav-a" id="postav">
						<li class="nav-li"><span class="nav-top">Поставщикам</span></li>
					</a>
					<a href="{{ route('about') }}" class="nav-a" id="onas">
						<li class="nav-li"><span class="nav-top">О нас</span></li>
					</a>
					<a href="{{ route('basket.index') }}" class="nav-a" id="basket">
						<li class="nav-li"><span class="nav-top">Корзина</span></li>
					</a>
				</ul>
			</div>
			<div class="stuff"></div>
			

			@include('shop.includes.sideBar')
			

			@yield('content')
			<div class="content-pod"></div>

		</div>

		<div class="footer">
			<div class="footer-p">
			<div class="footer-navigation">
				<ul class="footer-navigation-ul">
					<li class="footer-navigation-li"><a href="{{ route('products.index') }}" class="footer-navigation-a">Товары</a></li>
					<li class="footer-navigation-li"><a href="{{ route('payment_info') }}" class="footer-navigation-a">Оплата и доставка</a></li>
					<li class="footer-navigation-li"><a href="{{ route('contacts') }}" class="footer-navigation-a">Контакты</a></li>
					<li class="footer-navigation-li"><a href="{{ route('partner_info') }}" class="footer-navigation-a">Поставщикам</a></li>
					<li class="footer-navigation-li"><a href="{{ route('about') }}" class="footer-navigation-a">О нас</a></li>
					<li class="footer-navigation-li"><a href="{{ route('basket.index') }}" class="footer-navigation-a">Корзина</a></li>

				</ul>
			</div>
			Все права юридически защищены. Несанкционированное использование материалов сайта преследуется по закону.<br><br>Сайт создан <a href="https://vk.com/sevenzer0" target="blank"><span class="my">SevenZer0 ©</span></a></p>
			</div>
		</div>


	</body>

</html>