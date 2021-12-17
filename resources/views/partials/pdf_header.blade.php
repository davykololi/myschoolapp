<header>
	<h1 class="uc">{{ Auth::user()->school->name }}</h1>
	<p class="school_margin">{{ Auth::user()->school->postal_address }}</p>
	<p class="email_margin">Email: <i><u>{{ Auth::user()->school->email }}</u></i></p>
	<hr style="width: 85%;border-top: 10px groove brown;margin-top: -15px;margin-bottom: 20px;"/>
</header>
