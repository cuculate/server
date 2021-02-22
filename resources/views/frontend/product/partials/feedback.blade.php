<div class="feedback">
    <div class="name">Bình luận & nhận xét về sản phẩm</div>
    <div class="border" style="min-height: 100px">
        @foreach($feedbacks as $feedback)
            @if($feedback->status !== 3)
                <div class="m-3">
                    <div class="font-weight-bold">{{ $feedback->name }} </div>
                    <div>Tiêu đề: {{ $feedback->title }}:</div>
                    <div class="ml-2"> Nội dung: {{ $feedback->content }}</div>
                    <div class="mt-2">{{ $feedback->created_at }}</div>
                    <hr>
                </div>
            @endif
        @endforeach
    </div>
    <button onclick="show()" class="btn btn-primary mt-4">Bình luận ngay</button>
    <div class="feedback m-3" id="comment" style="display: none">
        <form name="comment" method="post" action="{{ route('feedback', $product->id) }}" class="feedback-form" autocomplete="off">
            @csrf
            <div class="feedback-form-group">
                <label for="name" class="contact-form-label">Họ và tên</label>
                <input id="name" type="text" name="name" class="feedback-form-input" required/>
            </div>
            <div class="feedback-form-group">
                <label for="title" class="contact-form-label">Tiêu đề</label>
                <input id="title" type="text" name="title" class="feedback-form-input" required/>
            </div>
            <div class="feedback-form-group">
                <label for="content" class="contact-form-label">Ý kiến của bạn về sản phẩm</label>
                <textarea name="content" id="content" class="feedback-form-area" placeholder="Cảm nhận của bạn về sản phẩm"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Bình luận</button>
        </form>
    </div>
</div>
