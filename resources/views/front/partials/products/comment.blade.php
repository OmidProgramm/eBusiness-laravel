@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/form.css') }}">
@endsection


<h2>Comment Section</h2>

@if(session('sendEmail'))
        <p class="session">{{session('sendEmail')}}</p>
    @endif
<div class="form-card">
    <form action="{{route('ajax-comments')}}" method="POST" id="comments">
        @csrf

        <div class="form-group">
            <label for="fullName" class="form-label">fullName:</label>
            <input class="form-control" type="text" id="fullName" name="fullName" placeholder="Your fullName" value="{{ old('fullName') }}" style="border:1px solid black">
            <p id="fullNameError" class="error hidden"></p>
        </div>
        
        @error('fullName')
            <p class="error">{{$message}}</p>
            @enderror
            
            
        <div class="form-group">
        <label class="form-label" for="email">email:</label>
        <input class="form-control" type="text" id="email" name="email" placeholder="your email" style="border:1px solid black">
        <p id="emailError" class="error hidden"></p>
        </div>
        @error('email')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
            <label class="form-label" for="comment">Comment:</label>
            <textarea class="form-control" style="resize: none; border:1px solid black"
                id="comment"
                name="comment"
                placeholder="Write comment.."
                >{{ old('comment') }}
            </textarea>
            <p id="commentError" class="error hidden"></p>
        </div>
        @error('comment')
            <p class="error">{{$message}}</p>
        @enderror
        <input type="text" value="{{$product_id}}" name="product_id" class="hidden" id="product_id">
        <input type="submit" value="Send" class="btn btn-success">
    </form>
    </div>
     
@section('js')

    <script>
        const form = document.getElementById('comments');
        form.addEventListener('submit', async function (e) {
            e.preventDefault();
           
            let isValid = true;
            const fullNameError = document.getElementById("fullNameError");
            const emailError = document.getElementById("emailError");
            const commentError = document.getElementById("commentError");
            
            fullNameError.textContent = "";
            fullNameError.classList.add("hidden");
            emailError.textContent = "";
            emailError.classList.add("hidden");
            commentError.textContent = "";
            commentError.classList.add("hidden");
            let fullName = document.getElementById('fullName').value;
            let email = document.getElementById('email').value;
            let comment = document.getElementById('comment').value;
            let product_id = document.getElementById('product_id').value;
            if(fullName.trim()===""){
                fullNameError.textContent = "Full name is required.";
                fullNameError.classList.remove("hidden");
                isValid = false;
            }
            const emailRegex =/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.trim() === "") {
                emailError.textContent = "Email is required.";
                emailError.classList.remove("hidden");
                isValid = false;
            }
            else if (!emailRegex.test(email.trim())) {
                emailError.textContent = "Invalid email."
                emailError.classList.remove("hidden");
                isValid = false;
            }
            if(comment.trim().length < 10){
                commentError.textContent = "Comment must be at least 10 characters.";
                commentError.classList.remove("hidden");
                isValid = false;
            }
            if(!isValid){
                return;
            }else{
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json'
                },
                    body: JSON.stringify({
                        fullName:fullName, 
                        email:email, 
                        comment:comment, 
                        product_id:product_id
                    }),
                });
                const result = await response.json();
                console.log(result);
                if (result.success) {
                    alert(result.message);
                } 
            } catch (error) {
                console.error(error);
            }}
        });
    </script>

    
@endsection
    
    



