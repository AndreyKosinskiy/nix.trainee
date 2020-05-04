<?php
echo '
<main role="main" class="d-flex d-row">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div id="photo text-center">
                    <img src="/templates/profile/default-cat.jpg" alt="profile-image">
                </div>
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="jumbotron p-0 row">
                    <div class="col-9">
                        <h1>' . $data['firstname'] . ' ' . $data['lastname'] . '</h1>
                        <h2>My Name</h2>
</div>
                    <div class="col-3">
                        <button type="button" class="btn btn-secondary" style="width: 100%;">Edit</button>
                    </div>
                </div>
                <hr class="my-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" id="first-tab" href="#first" role="tab">First Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" id="second-tab" href="#second" role="tab">Second Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" id="third-tab" href="#third" role="tab">Third Information</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">first-tab</div>
                    <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">second-tab</div>
                    <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">third-tab</div>
                </div>
            </div>
        </div>
    </div>
</main>
';
