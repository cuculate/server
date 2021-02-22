<div class="contact fixed-bottom d-flex justify-content-end">
    <div id="overlay"></div>
    <button type="button" class="btn btn-default p-0" onclick="showOn()">
        <img src="{{ asset('./images/site/btn-gopy.png') }}" alt="">
    </button>
    <div id="contact" style="display: none">
        <h2>Liên hệ với chúng tôi</h2>
        <button type="button" class="btn btn-sm" onclick="showOff()">
            <img src="{{ asset('./images/contact/close.png') }}" alt="close">
        </button>
        <form class="form-inline" method="post" action="{{ route('contact') }}">
            @csrf
            <input type="text" class="form-control" name="lhTennguoi" placeholder="Họ và tên" required>
            <input type="email" class="form-control" name="lhEmail" placeholder="Email của bạn" required>
            <input type="text" class="form-control" name="lhDiachi" placeholder="Địa chỉ" required>
            <input type="text" class="form-control" name="lhSDT" placeholder="Số điện thoại" required>
            <textarea name="lhNoidung" cols="30" placeholder="Yêu cầu của bạn là gì ?" required></textarea>
            <button type="submit" class="btn btn-primary">Gửi góp ý</button>
        </form>
    </div>
    <script>
        var x = document.getElementById("contact");
        var y = document.getElementById("overlay");

        function showOn() {
            x.style.display = "block";
            y.style.display = "block";
        }

        function showOff() {
            x.style.display = "none";
            y.style.display = "none";
        }
    </script>
</div>
