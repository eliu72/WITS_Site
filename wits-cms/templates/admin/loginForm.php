<?php include "templates/include/header.php" ?>

		</div>
        <div class="container" id="header" style="padding-top:5%; padding-bottom:3%">
        <h1><b>Admin Login</b></h1>
        </div>

    </section>

    <div class="container" style="margin-top:100px;">
      <form action="admin.php?action=login" method="post" style="width: auto;">
          <input type="hidden" name="login" value="true" />

          <?php if ( isset( $results['errorMessage'] ) ) { ?>
                  <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
          <?php } ?>

          <div class="row mx-auto">
              <div class="col-2"></div>
              <div class="col-2 my-auto">
                <label for="username">Username</label>
              </div>
              <div class="col-6">
                <input type="text" name="username" id="username" placeholder="Your admin username" required autofocus maxlength="20" />
              </div>
              <div class="col-2"></div>
            </div>

            <br>

            <div class="row mx-auto">
              <div class="col-2"></div>
              <div class="col-2 my-auto">
                <label for="password">Password</label>
              </div>
              <div class="col-6">
                <input type="password" name="password" id="password" placeholder="Your admin password" required autofocus maxlength="20" />
              </div>
              <div class="col-2"></div>
            </div>

            <br>
            <br>
            <div class="row">
              <div class="buttons mx-auto">
                <input type="submit" name="login" value="Login" />
              </div>
            </div>

        </form>

    </div>
