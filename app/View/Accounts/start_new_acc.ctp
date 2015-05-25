<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'AnchorSubmit',
		), array('inline' => false));
	$this->Html->css(array(
		'contorol1',
		'new_acc',
		), null, array('inline' => false));
?>
<div class="plot">
	<div class="container_title">
		<div class="title">
			<img class="new_acc_header" src="<?php echo IMG_PATH . 'accountregist_h.png'; ?>" alt="アカウント登録">
		</div>
	</div>
	<div class="pankuzu cf">
		<ul class="pankuzu_ul">
			<li><img class="navi_1" src="<?php echo IMG_PATH . 'accountregiststep1_on.png'; ?>" alt="アドレス入力"></li><!--
			--><li><img class="navi_2" src="<?php echo IMG_PATH . 'accountregiststep2.png'; ?>" alt="確認メール送信完了"></li><!--
			--><li><img class="navi_3" src="<?php echo IMG_PATH . 'accountregiststep3.png'; ?>" alt="登録情報入力"></li><!--
			--><li><img class="navi_4" src="<?php echo IMG_PATH . 'accountregiststep4.png'; ?>" alt="確認"></li><!--
			--><li><img class="navi_5" src="<?php echo IMG_PATH . 'accountregiststep5.png'; ?>" alt="完了"></li>
		</ul>
	</div>

	<div class="container_body">
		<?php echo $this->Form->create('Account'); ?>
		<h1 class="start_new_acc_title" style="margin-bottom: 30px;">アカウント登録用メールアドレス入力</h1>
		<p style="color: #bb0000; margin-bottom: 30px;">
			PlusStudyは専門学校HALの学生専用のサービスです。<br>
			関係者以外の方のアカウントを発見した際は、<br>
			予告なく削除させていただく場合がございます。
		</p>
		<p class="new_acc_p">
			アカウント登録用のメールをお送り致します。<br>
			メールアドレスを入力して、[確認メール送信]ボタンをクリックしてください。<br>
			登録用のメールアドレスは公開されませんが、万が一情報漏洩した際に<br>
			問題になるようなメールアドレスのご利用はお控え下さい。

		<div class="cf email_input">
			<div class="email_title">
				メールアドレス
			</div>
			<div class="email_form">
				<?php echo $this->Form->input('mailaddress', array('type' => 'email','class'=>'email new_acc_email','label'=>false)); ?>
			</div>
		</div>

		<p class="error"><?php echo $msg ?></p><!-- ←どこにだす？ -->
		<div class="longin_mail_btn">
			<a href="Acconts/index" ><img class="img_back_login" src="<?php echo IMG_PATH . 'backlogin_btn.png'; ?>" alt="ログイン画面に戻る"></a>
			<a href="#" class="btnSubmit"><img class="img_check_mail" src="<?php echo IMG_PATH . 'mailconfirm_btn.png'; ?>" alt="確認メール送信"></a>
		</div>
		<?php echo $this->Form->end();?>
	</div>
</div>
















































