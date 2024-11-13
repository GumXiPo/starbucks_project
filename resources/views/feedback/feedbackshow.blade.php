@extends('layouts.app')

@section('content')
<div class="container">
    <style>
       .star-rating {
    display: flex;
    gap: 5px;
    direction: rtl; /* Đảo ngược thứ tự của các sao */
    margin-right: 67%;
}

.star-rating input {
    display: none;
}

.star-rating label {
    font-size: 1.5em;
    color: #ddd;
    cursor: pointer;
}

.star-rating input:checked ~ label,
.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #f39c12; /* Màu vàng khi hover hoặc được chọn */
}

.star-rating label i {
    font-size: 1.5em; /* Điều chỉnh kích thước sao */
}


    </style>

    <h1>Gửi Phản Hồi</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="message">Nội dung phản hồi:</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="rating">Đánh giá sao:</label>
            <div class="star-rating">
                <input type="radio" id="star5" name="rating" value="5" />
                <label for="star5" title="5 sao"><i class="fa-solid fa-star"></i></label>

                <input type="radio" id="star4" name="rating" value="4" />
                <label for="star4" title="4 sao"><i class="fa-solid fa-star"></i></label>

                <input type="radio" id="star3" name="rating" value="3" />
                <label for="star3" title="3 sao"><i class="fa-solid fa-star"></i></label>

                <input type="radio" id="star2" name="rating" value="2" />
                <label for="star2" title="2 sao"><i class="fa-solid fa-star"></i></label>

                <input type="radio" id="star1" name="rating" value="1" />
                <label for="star1" title="1 sao"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>

    <hr>

    <h2>Danh Sách Phản Hồi</h2>

    @if($feedbacks->count() > 0)
    <ul class="list-group">
        @foreach($feedbacks as $feedback)
        <li class="list-group-item">
            <strong>{{ $feedback->user->username }}:</strong>
            {{ $feedback->message }}
            <small class="text-muted">{{ $feedback->created_at->diffForHumans() }}</small>
            <br>

            <strong>Đánh giá:</strong>
            <!-- Hiển thị sao dựa trên rating -->
            <div>
                @for($i = 1; $i <= 5; $i++)
                    <i class="fa-solid fa-star {{ $i <= $feedback->rating ? 'text-warning' : 'text-muted' }}"></i>
                    @endfor
            </div>
        </li>
        @endforeach
    </ul>

    <!-- Pagination links -->
    {{ $feedbacks->links() }}
    @else
    <p>Chưa có phản hồi nào.</p>
    @endif

</div>
@endsection

<script>
    document.querySelectorAll('.star-rating label').forEach(label => {
        label.addEventListener('mouseover', function() {
            let ratingValue = this.getAttribute('for').replace('star', '');
            for (let i = 1; i <= 5; i++) {
                let star = document.querySelector(`#star${i}`).nextElementSibling;
                if (i <= ratingValue) {
                    star.classList.add('text-warning');
                } else {
                    star.classList.remove('text-warning');
                }
            }
        });

        label.addEventListener('mouseout', function() {
            let ratingValue = document.querySelector('input[name="rating"]:checked');
            let selectedRating = ratingValue ? ratingValue.value : 0;
            for (let i = 1; i <= 5; i++) {
                let star = document.querySelector(`#star${i}`).nextElementSibling;
                if (i <= selectedRating) {
                    star.classList.add('text-warning');
                } else {
                    star.classList.remove('text-warning');
                }
            }
        });
    });
    document.querySelector('form').addEventListener('submit', function(event) {
        let rating = document.querySelector('input[name="rating"]:checked');
        let message = document.querySelector('textarea[name="message"]').value;

        if (!rating || message.trim() === "") {
            event.preventDefault(); // Ngừng gửi form nếu thiếu thông tin
            alert('Vui lòng chọn đánh giá sao và nhập nội dung phản hồi.');
        } else {
            if (!confirm('Bạn chắc chắn muốn gửi phản hồi này không?')) {
                event.preventDefault(); // Ngừng gửi form nếu người dùng không xác nhận
            }
        }
    });
</script>