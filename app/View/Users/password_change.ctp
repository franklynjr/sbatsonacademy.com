
<div class="container">
    <div class="row">
        <form class="" method="post">
            <div class="form-row">
                <label>Change Password: </label>
                <input class="form-control" type="password" name="password" required placeholder="new password" />
                <input class="form-control" type="password" name="confirm_password" required placeholder="confirm password" />
            </div>
            <div class="form-row">
                <div class="v-spacer-1"></div>
                <input formaction="/users/update/password/<?php echo $token; ?>" class="form-control" type="submit" value="Change Password" />
            </div>

        </form>
    </div>
</div>