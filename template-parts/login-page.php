<?php
?>

<style>

#loginform label[for="user_login"],
#loginform label[for="user_pass"] {
	display: block;
}

</style>

<section class="uo_loginForm">
    <div class="uo_error">
		<?php echo $login_error; ?>
    </div>

	<?php
	/*
	 * before_uo_login_ui hook
	 *
	 * @arg bool $lost_password
	 * @arg bool $reset_password_sent
	 * @arg bool $reset_password_sent_success
	 * @arg bool $register
	 * @arg bool $reset_password
	 * @arg bool $validate_password_reset
	 */
	do_action( 'before_uo_login_ui', $lost_password, $reset_password_sent, $reset_password_sent_success, $register, $reset_password, $validate_password_reset );

	if ( is_user_logged_in() ) {
		echo '<div class="uo_logout"> ' . $innerText['Hello'] . ',
                            <div class="uo_logout_user">', $user_login, ' ' . $innerText['Logged-In-Message'] . '</div>
                            <a id="wp-submit" href="', wp_logout_url(), '" title="Logout">' . $innerText['Logout'] . '</a>
                        </div>';
	} else if ( $lost_password ) {
		?>
        <h2><?php echo $innerText['Password-Recovery-Title']; ?></h2>
        <form id="lostpasswordform" name="lostpasswordform"
              action="<?php echo site_url( 'wp-login.php?action=lostpassword', 'login_post' ) ?>" method="post">
            <p>
                <label for="user_login"><?php echo $innerText['Password-Recovery-Label']; ?></label>
                <input size="20" type="text" name="user_login" id="user_login" value="">
            </p>

            <input type="hidden" name="redirect_to"
                   value="<?php echo get_permalink( $login_page ); ?>?action=forgot&success=1">

            <p class="submit"><input type="submit" name="wp-submit" id="wp-submit"
                                     value="<?php echo $innerText['Get-New-Password']; ?>"/></p>
        </form>
		<?php
	} elseif ( $reset_password_sent ) {
		if ( $reset_password_sent_success ) {
			?>
            <p class="login-msg">
                <strong><?php echo $innerText['Success']; ?></strong> <?php echo $innerText['Success-Email-Sent']; ?>
            </p>
			<?php
		} else {
			?>
            <p class="login-msg">
                <strong><?php echo $innerText['Oops']; ?></strong> <?php echo $innerText['Failed-Send-Email']; ?></p>
            <p>
                <a href="<?php echo get_permalink( $login_page ); ?>?action=lostpassword"><?php echo $innerText['Try-again']; ?></a>
            </p>
			<?php
		}
	} elseif ( $register ) {
		if ( $register_show ) {
			?>
            <form name="registerform" id="registerform" action="<?php echo wp_login_url(); ?>?action=register"
                  method="post" novalidate="novalidate">
                <p>
                    <label for="user_login">Username2<br>
                        <input type="text" name="user_login" id="user_login" class="input" value="" size="20"></label>
                </p>

                <p>
                    <label for="user_email">Email<br>
                        <input type="email" name="user_email" id="user_email" class="input" value="" size="25"></label>
                </p>

				<?php do_action( 'register_form' ); ?>

                <p id="reg_passmail">Registration confirmation will be emailed to you.</p>
                <br class="clear">
                <input type="hidden" name="redirect_to" value="">

                <p class="submit"><input type="submit" name="wp-submit" id="wp-submit"
                                         class="button button-primary button-large" value="Register"></p>
            </form>
			<?php
		}
	} elseif ( $reset_password ) {

		if ( isset( $_GET['key'] ) && isset( $_GET['login'] ) ) {
			$rp_key    = $_GET['key'];
			$rp_login  = $_GET['login'];
			$rp_cookie = 'wp-resetpass-' . COOKIEHASH;
			$value     = sprintf( '%s:%s', wp_unslash( $_GET['login'] ), wp_unslash( $_GET['key'] ) );
			//setcookie( $rp_cookie, $value, 0, '/' . get_post_field( 'post_name', $login_page ), COOKIE_DOMAIN, is_ssl(), true );

			?>
            <h2><?php echo $innerText['Reset-Password-Title']; ?></h2>
            <form name="resetpassform" id="resetpassform"
                  action="?action=validatepasswordreset" method="post"
                  autocomplete="off">
                <input type="hidden" id="user_login" name="rp_login" value="<?php echo esc_attr( $rp_login ); ?>"
                       autocomplete="off"/>

                <div class="user-pass1-wrap">
                    <p>
                        <label for="pass1"><?php echo $innerText['New-Password']; ?></label>
                    </p>

                    <div class="wp-pwd">
                            <span class="password-input-wrapper">
                                <input type="password" data-reveal="1"
                                       data-pw="<?php echo esc_attr( wp_generate_password( 16 ) ); ?>" name="pass1"
                                       id="pass1" class="input" size="20" value="" autocomplete="off"
                                       aria-describedby="pass-strength-result"/>
                            </span>
                    </div>
                </div>
                <p class="user-pass2-wrap">
                    <label for="pass2"><?php echo $innerText['Confirm-Password']; ?></label><br/>
                    <input type="password" name="pass2" id="pass2" class="input" size="20" value="" autocomplete="off"/>
                </p>

                <p class="description indicator-hint"><?php echo $innerText['Password-Indicator-Hint']; ?></p>
                <br class="clear"/>
                <input type="hidden" name="rp_key" value="<?php echo esc_attr( $rp_key ); ?>"/>

                <p class="submit"><input type="submit" name="wp-submit" id="wp-submit"
                                         class="button button-primary button-large"
                                         value="<?php esc_attr_e( 'Reset Password' ); ?>"/></p>
            </form>
			<?php

		} else {

			?>
            <p class="login-msg">
                <strong><?php echo $innerText['Oops']; ?></strong> <?php echo $innerText['Password-Reset-Link-Failed']; ?>
            </p>
			<?php
		}
	} elseif ( $validate_password_reset ) {
		if ( isset( $_GET['issue'] ) ) {

			if ( 'invalidkey' === $_GET['issue'] ) {
				echo '<h2>' . $innerText['Invalid-Reset-Key'] . '</h2>';
			} elseif ( 'expiredkey' === $_GET['issue'] ) {
				echo '<h2>' . $innerText['Expired-Reset-Key'] . '</h2>';
			}
		} else {
			$rp_cookie = 'wp-resetpass-' . COOKIEHASH;
			if ( isset( $_COOKIE[ $rp_cookie ] ) && 0 < strpos( $_COOKIE[ $rp_cookie ], ':' ) ) {
				list( $rp_login, $rp_key ) = explode( ':', wp_unslash( $_COOKIE[ $rp_cookie ] ), 2 );
				$user = check_password_reset_key( $rp_key, $rp_login );
				//var_dump($user);
				if ( isset( $_POST['pass1'] ) && ! hash_equals( $rp_key, $_POST['rp_key'] ) ) {
					$user = false;
				}
			} else {
				$user = false;
			}

			if ( ! $user || is_wp_error( $user ) && ! isset( $_POST['pass1'] ) ) {

				//setcookie( $rp_cookie, ' ', time() - YEAR_IN_SECONDS, '/login', COOKIE_DOMAIN, is_ssl(), true );
				if ( $user && $user->get_error_code() === 'expired_key' ) {
					wp_safe_redirect( get_permalink( $login_page ) . '?action=validatepasswordreset&issue=expiredkey' );
				} else {
					wp_safe_redirect( get_permalink( $login_page ) . '?action=validatepasswordreset&issue=invalidkey' );
				}
			}

			$errors = new WP_Error();

			if ( isset( $_POST['pass1'] ) && $_POST['pass1'] != $_POST['pass2'] ) {

				echo '<h2>' . $innerText['Password-Not-Match'] . '</h2>';

			} elseif ( isset( $_POST['pass1'] ) && ! empty( $_POST['pass1'] ) ) {

				reset_password( $user, $_POST['pass1'] );
				//setcookie( $rp_cookie, ' ', time() - YEAR_IN_SECONDS, '/login', COOKIE_DOMAIN, is_ssl(), true );

				echo '<h2>' . $innerText['Reset-Success'] . '</h2>';

				wp_login_form( $login_form_args );
			}
		}
	} else {
		?>
        <h2>Login</h2>
		<?php
		wp_login_form( $login_form_args );

		// Add registration link allowed
		if ( get_option( 'users_can_register' ) ) {
			echo '<a class="register-link" href="' . wp_registration_url() . '" >' . $innerText['Register-Link'] . '</a>';
		}

	}
	/*
	 * after_uo_login_ui hook
	 *
	 * @arg bool $lost_password
	 * @arg bool $reset_password_sent
	 * @arg bool $reset_password_sent_success
	 * @arg bool $register
	 * @arg bool $reset_password
	 * @arg bool $validate_password_reset
	 */
	do_action( 'after_uo_login_ui', $lost_password, $reset_password_sent, $reset_password_sent_success, $register, $reset_password, $validate_password_reset );
	?>

</section>
<!-- /section -->
