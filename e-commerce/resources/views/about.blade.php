@extends('template')

@section('title')
    About
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card bg-light shadow p-3 mb-5 bg-body rounded m-5 border-light">
            <div class="card-body text-center">
                <h4 class="card-title mb-4"><b>JSON Sporty
                </b></h4>
                <div>
                    Welcome to JSON Sporty, where innovation meets comfort in the world of sportswear. Our mission is to provide athletes and fitness enthusiasts with high-quality, stylish, and functional apparel that enhances performance and boosts confidence. Whether you're on the track, in the gym, or practicing yoga, JSON Sporty has got you covered.
                </div>
                <div class="mt-4">
                    Our products are crafted from premium materials designed to offer durability, breathability, and flexibility. We are committed to sustainable practices, ensuring that our manufacturing processes are environmentally friendly. Join us on our journey to revolutionize sportswear and help you achieve your fitness goals with ease and style.
                </div>
                <div class="dark-mode float-center my-3">
                    <a href="{{ route('user.home') }}" class="btn btn-dark">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
