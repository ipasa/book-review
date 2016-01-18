@if($bookdetails->comments->count()==0 and !\Auth::check())
    <p>SORRY. NO REVIEW BY USERS. Want's to {!! link_to('auth/login', 'Login')  !!}</p>

@elseif($bookdetails->comments->count()==0 and \Auth::check())
    <p>SORRY. NO REVIEW BY USERS.</p>

@else
    @foreach($bookdetails->comments as $comments)

        <div class="single_user">
            <img src="{{ URL::asset('images/user/david-bushell-reviewer.png') }}" alt="">
            <span class="reviewer_name">— {{ $comments->user->name }}</span>
            <!-- USER SINGLE RATING -->
            <span>
                <p class="stars reviewer_rating">
                    <div class="grating">Rating -</div>
                    <span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </span>
                </p>
            </span>
            <!-- END OF USER SINGLE RATING -->
            <blockquote class="user_blockquote">
                {{ $comments->comment }}
            </blockquote>
        </div>

    @endforeach
@endif