{{-- @extends('fe.master')
@section('contact')
    @include('fe.contact')
@endsection
@section('content')
<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Contact</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Contact -->
	<div class="heading-title text-center" style="margin-top: 100px;">
		<h2>Location</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
		<div class="map-full" style="margin-top: 50px;">
			<iframe 
			src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3504.8677363437373!2d106.86096107441362!3d-6.487623663428328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjknMTUuNSJTIDEwNsKwNTEnNDguNyJF!5e1!3m2!1sid!2sid!4v1745394732689!5m2!1sid!2sid" 
			width="100%" 
			height="500" 
			style="border:0;" 
			allowfullscreen=""
			loading="lazy">
		</iframe>
		</div>
	</div>
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Contact Me</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form id="contactForm" action="{{ route('contact.send') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
									<div class="help-block with-errors"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								<div class="form-group"> 
									<textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="4" data-error="Write your message" required></textarea>
									<div class="help-block with-errors"></div>
								</div>
								<div class="submit-button text-center">
									<button class="btn btn-common" id="submit" type="submit">Send Message</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div> 
									<div class="clearfix"></div> 
								</div>
							</div>
						</div>            
					</form>
					@if(session('pesan'))
						<div class="alert alert-success mt-3">{{ session('pesan') }}</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->

		<form action="" id="delete" method="POST">
		@method('delete')
		@csrf 
	</form>
		
	<script>
		const body = document.getElementById('body')
		const form = document.getElementById('delete')

		function hapus(event, el){
			event.preventDefault()
			swal({
				title: "Are you sure?",
				text: "Your will delete this package permanently!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
				},
				function(){
					form.setAttribute('action', el.getAttribute('href'))
					form.submit()
				});
		}

		function tampil_pesan(){
			const pesan = "{{session('pesan')}}"

			if(pesan.trim() !== ''){
				swal('Good Job', pesan, 'success')
			}
		}

		body.onload = function(){
			tampil_pesan()
		}
	</script>
@endsection --}}