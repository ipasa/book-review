@if($bookdetails->comments->count()==0 and !\Auth::check())
    <p>SORRY. NO REVIEW BY USERS. Want's to {!! link_to('auth/login', 'Login')  !!}</p>

@elseif($bookdetails->comments->count()==0 and \Auth::check())
    <p>SORRY. NO REVIEW BY USERS.</p>

@else
    @foreach($bookdetails->comments as $comments)

        <div class="single_user">
            <img src="{{ URL::asset('images/user/david-bushell-reviewer.png') }}" alt="">
            <span class="reviewer_name">— {{ $comments->user->name }}</span>
            <?php $i = $comments->score_tag; ?>
            <!-- USER SINGLE RATING -->
            <span>
                <p class="stars reviewer_rating">
                    <div class="grating">Rating -</div>
                    <span>
                        @for($j=1;$j<=$i;$j++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @for($j=1;$j<=10-$i;$j++)
                            <i class="fa fa-star-o"></i>
                        @endfor
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