<!DOCTYPE html>
<html lang="ru">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



<section style="background-color: rgb(211, 211, 211);">
    <div class="container py-5">

      <div class="row">

        <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

          <h5 class="nav-item">
            <a href="{{ route('adminpanel') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Главная
                </p>
            </a></h5>

          <div class="card">
            <div class="card-body">

              <ul class="list-unstyled mb-0">
                @foreach ($users as $user)
                <li class="p-2 border-bottom" style="background-color: #eee;">
                  <a href="#!" class="d-flex justify-content-between">
                    <div class="d-flex flex-row">

                      <div class="pt-1">
                        <p class="fw-bold mb-0">{{ $user->name }}</p>
                        <p class="small text-muted" id="message"></p>
                      </div>
                    </div>
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-7 col-xl-8">

          <ul class="list-unstyled">
            <li class="d-flex justify-content-between mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
              <div class="card">
                <div class="card-header d-flex justify-content-between p-3">
                  <p class="fw-bold mb-0">Brad Pitt</p>
                  <p class="text-muted small mb-0"><i class="far fa-clock"></i> 12 mins ago</p>
                </div>
                <div class="card-body">
                  <p class="mb-0">
                  </p>
                </div>
              </div>
            </li>
            <li class="d-flex justify-content-between mb-4">
              <div class="card w-100">
                <div class="card-header d-flex justify-content-between p-3">
                  <p class="fw-bold mb-0">Lara Croft</p>
                  <p class="text-muted small mb-0"><i class="far fa-clock"></i> 13 mins ago</p>
                </div>
                <div class="card-body">
                  <p class="mb-0">

                  </p>
                </div>
              </div>
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
            </li>
            <li class="d-flex justify-content-between mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
              <div class="card">
                <div class="card-header d-flex justify-content-between p-3">
                  <p class="fw-bold mb-0">Brad Pitt</p>
                  <p class="text-muted small mb-0"><i class="far fa-clock"></i> 10 mins ago</p>
                </div>
                <div class="card-body">
                  <p class="mb-0">

                  </p>
                </div>
              </div>
            </li>
            <li class="bg-white mb-3">
              <div class="form-outline">
                <label class="form-label" for="textAreaExample2">Message:</label>
                <textarea class="form-control" id="textAreaExample2" rows="4"></textarea>

              </div>
            </li>
            <button type="button" class="btn btn-info btn-rounded float-end">Send</button>
          </ul>

        </div>

      </div>

    </div>
  </section>
{{-- <script>
    let socket = new WebSocket("ws://192.168.19.27:8080");
    socket.onopen = function(e) {
  alert("[open] Соединение установлено");
  alert("Отправляем данные на сервер");

};

socket.onmessage = function(event) {
  document.getElementById('message').append(event.data)
};

socket.onclose = function(event) {
  if (event.wasClean) {
    alert(`[close] Соединение закрыто чисто, код=${event.code} причина=${event.reason}`);
  } else {
    // например, сервер убил процесс или сеть недоступна
    // обычно в этом случае event.code 1006
    alert('[close] Соединение прервано');
  }
};

socket.onerror = function(error) {
  alert(`[error] ${error.message}`);
};
</script> --}}
