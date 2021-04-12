<div class="feedback">
    <form name="comment" method="post" action="{{ route('feedback', $product->id) }}" autocomplete="off" id="commentform" class="comment-form"
          novalidate="">
        @csrf
        <div class="comment-form-rating">
            <span>Your rating</span>
            <p class="stars">

                <label for="rated-1"></label>
                <input type="radio" id="rated-1" name="star" value="1">
                <label for="rated-2"></label>
                <input type="radio" id="rated-2" name="star" value="2">
                <label for="rated-3"></label>
                <input type="radio" id="rated-3" name="star" value="3">
                <label for="rated-4"></label>
                <input type="radio" id="rated-4" name="star" value="4">
                <label for="rated-5"></label>
                <input type="radio" id="rated-5" name="star" value="5"
                       checked="checked">
            </p>
        </div>
        <p class="comment-form-author">
            <label for="name">Họ và tên <span class="required">*</span></label>
            <input id="name" name="name" type="text" value="" required>
        </p>
        <p class="comment-form-author">
            <label for="title">Tiêu đề <span class="required">*</span></label>
            <input id="title" name="title" type="text" value="" required>
        </p>
        <p class="comment-form-comment">
            <label for="comment">Your review <span class="required">*</span>
            </label>
            <textarea id="comment" name="content" cols="45" rows="8"></textarea>
        </p>
        <p class="form-submit">
            <input name="submit" type="submit" id="submit" class="submit"
                   value="Submit">
        </p>
    </form>
</div>
