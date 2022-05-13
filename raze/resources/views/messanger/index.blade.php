<!DOCTYPE html>
<html lang="ru">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>



<section class="msger">
    <header class="msger-header">
        <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i> SimpleChat
        </div>
        <div class="msger-header-options">
            <span><i class="fas fa-cog"></i></span>
        </div>
    </header>

    <main class="msger-chat">
        <div class="msg left-msg">
            <div class="msg-img"
                style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"></div>
            @foreach ($messages as $message)
                {{-- {{dd($message)}}; --}}
                <div class="msg-info">
                    <div class="msg-info-name">{{ $message->sender->name }}</div>
                    <div class="msg-info-time"></div>
                </div>

                <div class="msg-text">
                    {{ $message['text'] }}
                </div>
            @endforeach
        </div>
    </main>

    <form action="{{ route('message.store') }}" method="POST" class="msger-inputarea">
        @csrf
        <input type="text" name="text" class="msger-input" id="user-message" placeholder="Enter your message...">
        <button type="button" class="msger-send-btn">Send</button>
    </form>
</section>
{{-- <script>
    Echo.channel(`Channel`)
        .listen('TranslationEvent', (e) => {
            console.log(e.order);
        });
</script> --}}

<script>
    let socket = new WebSocket("ws://192.168.19.52:8080");
    socket.onopen = function(e) {
        //   alert("[open] Соединение установлено");
        //   alert("Отправляем данные на сервер");

    };

    socket.onmessage = function(event) {
        console.log(event);

        let msgInfo = document.createElement('div');
        msgInfo.classList.add('msg-info');

        let msgText = document.createElement('div');
        msgText.classList.add('msg-text');
        msgText.innerText = event.data;

        msgInfo.append(msgText);

        document.querySelector('.msg').append(msgInfo);
    };

    socket.onclose = function(event) {
        if (event.wasClean) {
            alert(`[close] Соединение закрыто чисто, код=${event.code} причина=${event.reason}`);
        } else {
            // например, сервер убил процесс или сеть недоступна
            // обычно в этом случае event.code 1006
            // alert('[close] Соединение прервано');
        }
    };

    socket.onerror = function(error) {
        //   alert(`[error] ${error.message}`);
    };


    document.querySelector('.msger-send-btn').addEventListener('click', function(e) {
        let body = {
            text: document.querySelector('#user-message').value
        }
        fetch("{{ route('message.store') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(body),
        });

        socket.send(document.querySelector('#user-message').value);
    });
</script>
