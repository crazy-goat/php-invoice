<?php $this->layout('layout-login'); ?>
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <form action="/login" method="post">
                <h1>Logowanie</h1>
                <div>
                    <input type="text" class="form-control" placeholder="Username" required="" name="user" />
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                </div>
                <div>
                    <button type="submit" class="btn btn-default submit">Zaloguj</button>
                </div>

                <div class="clearfix"></div>
            </form>
        </section>
    </div>
</div>