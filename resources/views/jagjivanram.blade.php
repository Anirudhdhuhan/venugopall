	<head>
		@include('layout.head')
		<title>Preetham Nagarigari</title>
	</head>
<main>
	@include('includes.top-menu')
	<div class="banner1 hidden-xs" style="background-image: url({{ STATIC_BASE_URL . '/images/jagjivan.png' }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- <h3 class="key-people">
						<center>
							<div class="key-people-text mt-2">
								Latest Videos
							</div>
						</center>
					</h3> -->
				</div>
			</div>
		</div>
	</div>
	<div class="banner-mission hidden-lg hidden-md hidden-sm" style="background-image: url({{ STATIC_BASE_URL . '/images/yug.jpeg' }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="key-people">
						<!-- <center>
							<div class="key-people-text mt-2">
								Direct Connect
							</div>
						</center> -->
					</h3>
				</div>
			</div>
		</div>
	</div>
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<h1 class="key-head">Jagjivan Ram</h1>
    			<div class="upcoming-event mt-2">
    				<!-- <h3 class="key-people">
						<center>
							<div class="key-people-texts">Some Heading</div>
						</center>
					</h3> -->
					<div class="about-description">
							Jagjivan Ram, popularly known as Babuji was a national leader, a freedom fighter, a crusader of social justice, a champion of depressed classes, an outstanding Parliamentarian, a true democrat, a distinguished Union Minister, an able administrator and an exceptionally gifted orator. He had a towering personality and played a long inning, spanning over half a century in Indian politics with commitment, dedication and devotion. Babuji was married to Indrani Devi in June 1935. Indrani Devi was herself a freedom fighter and an educationist. Her father Dr. Birbal, a renowned medical practitioner, had been in the British army and had been awarded the Victoria Medal by the then Viceroy, Lord Lansdowne for his services in the Chin-Lushai Expedition of 1889-90. A son, Suresh Kumar was born to them on 17 July, 1938, and a daughter Meira on 31 March, 1945. Suresh Kumar passed away on 21 May, 1985, leaving his parents completely heart-broken.<br><br>

							Jagjivan Ram was born in a small village, Chandwa in Shahabad District, now Bhojpur, in Bihar on 5 April, 1908, to Sobhi Ram and Vasanti Devi. Jagjivan Ram imbibed his idealism, humanitarian values and resilience from his father, who was of a religious disposition and the Mahant of the Shiv Narayani Sect. He was still in school when his father passed away leaving young Jagjivan in the care of his mother. Under his mother's guidance, Jagjivan Ram passed his Matriculation in first division from Arrah Town School. Despite facing caste based discrimination, Jagjivan Ram successfully completed the Inter Science Examination from the Banaras Hindu University and later graduated from Calcutta University.<br><br>

							Jagjivan Ram had organized a number of Ravidas Sammelans and had celebrated Guru Ravidas Jayanti in different areas of Calcutta (Kolkata). In 1934, he founded the Akhil Bharatiya Ravidas Mahasabha in Calcutta and the All India Depressed Classes League. Through these Organizations he involved the depressed classes in the freedom struggle. He was of the view that Dalit leaders should not only fight for social reforms but, also demand political representation. The next year, i.e. on 19 October, 1935, Babuji appeared before the Hammond Commission at Ranchi and demanded, for the first time, voting rights for the Dalits.<br><br>

							Babu Jagjivan Ram played a very active and crucial role in the freedom struggle. Inspired by Gandhiji, Babuji courted arrest on 10 December, 1940. After his release, he entrenched himself deeply into the Civil Disobedience Movement and Satyagraha. Babuji was arrested again on 19 August, 1942, for his active participation in the Quit India Movement launched by the Indian National Congress.<br><br>

							Babuji had a long and distinguished political career of over five decades. Starting his public life as a student activist and freedom fighter, he went on to become a Legislator at the young age of 28 in the year 1936, as a nominated member of the Bihar Legislative Council. Again in 1936, he stood as a candidate of the Depressed Classes League. He was declared elected unopposed to the Bihar Legislative Assembly from the East Central Shahabad (Rural) constituency on 10 December, 1936. When the Congress Government was formed in 1937, Babuji was appointed as the Parliamentary Secretary in the Ministry of Education and Development. However, in 1938, he resigned along with the entire Cabinet.<br><br>

							Jagjivan Ram was again elected unopposed in 1946 and was inducted into the Interim Government on 2 September, 1946, as the Minister of Labour. Thereafter, he remained a member of the Union Cabinet for nearly 31 years. Right from 1937, he played a dominant role in the Indian National Congress. During the pre-Independence period, Babuji held important offices at the State level in the Congress party. After Independence, he became the axis of the Party and indispensable for party affairs as well as governance of the country. He was a member of the All India Congress Committee from 1940 to 1977 and was in the Congress Working Committee from 1948 to 1977. He was in the Central Parliamentary Board from 1950 to 1977. Due to his astute political acumen, he was dear to stalwarts like Pandit Jawaharlal Nehru and Smt. Indira Gandhi.<br><br>

						</div>
    			</div>
    		</div>
    	</div>
    </div>
	@include('includes.footers')
</main>
@section('scripts')
	<script type="text/javascript">
		var swiper = new Swiper('.swiper-container', {
	      pagination: {
	        el: '.swiper-pagination',
	      },
	    });
	</script>
@endsection