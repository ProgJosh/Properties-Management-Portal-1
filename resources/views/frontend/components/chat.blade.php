
<div class="floating-chat">
    <button type="button" class="floating-chat__icon">
        <i class="fa fa-comments"></i>
    </button>

    <div class="floating-chat__box">
        <div class="floating-chat__box--inner">
            <div class="floating-chat__header">
                <span class="floating-chat____title"> What's on your mind? </span>
                <button class="floating-chat__close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <ul class="floating-chat__list">
                <li class="floating-chat__item other">
                    <img src="{{ asset('frontend/assets/images/thumbs/user-img1.png') }}" alt=""
                        class="floating-chat__img">
                    <p class="floating-chat__text">Hey! How are you doing?</p>
                </li>
                <li class="floating-chat__item self">
                    <img src="{{ asset('frontend/assets/images/thumbs/user-img2.png') }}" alt=""
                        class="floating-chat__img">
                    <p class="floating-chat__text">Hello! I am doing well</p>
                </li>
                <li class="floating-chat__item other">
                    <img src="{{ asset('frontend/assets/images/thumbs/user-img1.png') }}" alt=""
                        class="floating-chat__img">
                    <p class="floating-chat__text">Hey! How are you doing?</p>
                </li>
                <li class="floating-chat__item self">
                    <img src="{{ asset('frontend/assets/images/thumbs/user-img2.png') }}" alt=""
                        class="floating-chat__img">
                    <p class="floating-chat__text">Hello! I am doing well</p>
                </li>
                <li class="floating-chat__item other">
                    <img src="{{ asset('frontend/assets/images/thumbs/user-img1.png') }}" alt=""
                        class="floating-chat__img">
                    <p class="floating-chat__text">Hey! How are you doing?</p>
                </li>
                <li class="floating-chat__item self">
                    <img src="assets/images/thumbs/user-img2.png" alt="" class="floating-chat__img">
                    <p class="floating-chat__text">Hello! I am doing well</p>
                </li>
            </ul>
            <div class="floating-chat__footer">
                <input type="text" class="common-input common-input--sm flex-grow-1"
                    placeholder="Write Message">
                <button class="btn btn-main btn-sm flex-shrink-0">send</button>
            </div>
        </div>
    </div>
</div>